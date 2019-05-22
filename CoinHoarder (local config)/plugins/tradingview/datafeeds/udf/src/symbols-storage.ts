import {
	LibrarySymbolInfo,
	SearchSymbolResultItem,
} from '../../../charting_library/datafeed-api';

import {
	getErrorMessage,
	logMessage,
} from './helpers';

import { Requester } from './requester';

interface SymbolInfoMap {
	[symbol: string]: LibrarySymbolInfo | undefined;
}

interface ExchangeDataResponseOptionalValues {
	'ticker': string;

	'minmov2': number;
	'minmove2': number;

	'minmov': number;
	'minmovement': number;

	'supported-resolutions': string[];

	'force-session-rebuild': boolean;

	'has-intraday': boolean;
	'has-daily': boolean;
	'has-weekly-and-monthly': boolean;
	'has-empty-bars': boolean;
	'has-no-volume': boolean;

	'intraday-multipliers': string[];

	'volume-precision': number;
}

interface ExchangeDataResponseMandatoryValues {
	'type': string;
	'timezone': LibrarySymbolInfo['timezone'];
	'description': string;

	'exchange-listed': string;
	'exchange-traded': string;

	'session-regular': string;

	'fractional': boolean;

	'pricescale': number;
}

// Here is some black magic with types to get compile-time checks of names and types
type ValueOrArray<T> = T | T[];
type ExchangeDataResponse =
	{
		Data: any;
	} &
	{
		[K in keyof ExchangeDataResponseMandatoryValues]: ValueOrArray<ExchangeDataResponseMandatoryValues[K]>;
	} &
	{
		[K in keyof ExchangeDataResponseOptionalValues]?: ValueOrArray<ExchangeDataResponseOptionalValues[K]>;
	};

function extractField<Field extends keyof ExchangeDataResponseMandatoryValues>(data: ExchangeDataResponse, field: Field, arrayIndex: number): ExchangeDataResponseMandatoryValues[Field];
function extractField<Field extends keyof ExchangeDataResponseOptionalValues>(data: ExchangeDataResponse, field: Field, arrayIndex: number): ExchangeDataResponseOptionalValues[Field] | undefined;
function extractField<Field extends keyof ExchangeDataResponseMandatoryValues>(data: ExchangeDataResponse, field: Field, arrayIndex: number): (ExchangeDataResponseMandatoryValues & ExchangeDataResponseOptionalValues)[Field] | undefined {
	const value = data[field];
	return Array.isArray(value) ? value[arrayIndex] : value;
}

export class SymbolsStorage {
	private readonly _exchangesList: string[] = ['CRYPTOCOMPARE'];
	private readonly _symbolsInfo: SymbolInfoMap = {};
	private readonly _symbolsList: string[] = [];
	private readonly _datafeedUrl: string;
	private readonly _api_key: string;
	private readonly _readyPromise: Promise<void>;
	private readonly _datafeedSupportedResolutions: string[];
	private readonly _requester: Requester;

	public constructor(datafeedUrl: string, api_key: string, datafeedSupportedResolutions: string[], requester: Requester) {
		this._datafeedUrl = datafeedUrl;
		this._api_key = api_key;
		this._datafeedSupportedResolutions = datafeedSupportedResolutions;
		this._requester = requester;
		this._readyPromise = this._init();
		this._readyPromise.catch((error: Error) => {
			// seems it is impossible
			console.error(`SymbolsStorage: Cannot init, error=${error.toString()}`);
		});
	}

	// BEWARE: this function does not consider symbol's exchange
	public resolveSymbol(symbolName: string): Promise<LibrarySymbolInfo> {
		return this._readyPromise.then(() => {
			const symbolInfo = this._symbolsInfo[symbolName];
			if (symbolInfo === undefined) {
				return Promise.reject('invalid symbol');
			}

			return Promise.resolve(symbolInfo);
		});
	}

	public searchSymbols(searchString: string, exchange: string, symbolType: string, maxSearchResults: number): Promise<SearchSymbolResultItem[]> {
		interface WeightedItem {
			symbolInfo: LibrarySymbolInfo;
			weight: number;
		}

		return this._readyPromise.then(() => {
			const weightedResult: WeightedItem[] = [];
			const queryIsEmpty = searchString.length === 0;

			searchString = searchString.toUpperCase();

			for (const symbolName of this._symbolsList) {
				const symbolInfo = this._symbolsInfo[symbolName];

				if (symbolInfo === undefined) {
					continue;
				}

				if (symbolType.length > 0 && symbolInfo.type !== symbolType) {
					continue;
				}

				if (exchange && exchange.length > 0 && symbolInfo.exchange !== exchange) {
					continue;
				}

				const positionInName = symbolInfo.name.toUpperCase().indexOf(searchString);
				const positionInDescription = symbolInfo.description.toUpperCase().indexOf(searchString);

				if (queryIsEmpty || positionInName >= 0 || positionInDescription >= 0) {
					const alreadyExists = weightedResult.some((item: WeightedItem) => item.symbolInfo === symbolInfo);
					if (!alreadyExists) {
						const weight = positionInName >= 0 ? positionInName : 8000 + positionInDescription;
						weightedResult.push({ symbolInfo: symbolInfo, weight: weight });
					}
				}
			}

			const result = weightedResult
				.sort((item1: WeightedItem, item2: WeightedItem) => item1.weight - item2.weight)
				.slice(0, maxSearchResults)
				.map((item: WeightedItem) => {
					const symbolInfo = item.symbolInfo;
					return {
						symbol: symbolInfo.name,
						full_name: symbolInfo.full_name,
						description: symbolInfo.description,
						exchange: symbolInfo.exchange,
						params: [],
						type: symbolInfo.type,
						ticker: symbolInfo.name,
					};
				});

			return Promise.resolve(result);
		});
	}

	private _init(): Promise<void> {
		interface BooleanMap {
			[key: string]: boolean | undefined;
		}

		const promises: Promise<void>[] = [];
		const alreadyRequestedExchanges: BooleanMap = {};

		for (const exchange of this._exchangesList) {
			if (alreadyRequestedExchanges[exchange]) {
				continue;
			}

			alreadyRequestedExchanges[exchange] = true;
			promises.push(this._requestExchangeData(exchange));
		}

		return Promise.all(promises)
			.then(() => {
				this._symbolsList.sort();
				logMessage('SymbolsStorage: All exchanges data loaded');
			});
	}

	private _requestExchangeData(exchange: string): Promise<void> {
		return new Promise((resolve: () => void, reject: (error: Error) => void) => {
			this._requester.sendRequest<ExchangeDataResponse>(this._datafeedUrl, 'data/all/coinlist', {api_key:this._api_key})
				.then((response: ExchangeDataResponse) => {
					try {
						this._onExchangeDataReceived(exchange, response);
					} catch (error) {
						reject(error);
						return;
					}

					resolve();
				})
				.catch((reason?: string | Error) => {
					logMessage(`SymbolsStorage: Request data for exchange '${exchange}' failed, reason=${getErrorMessage(reason)}`);
					resolve();
				});
		});
	}

	private _onExchangeDataReceived(exchange: string, data: ExchangeDataResponse): void {
		let symbolIndex = 0;
		try {
			//const symbolsCount = data["Data"].length;
			logMessage(`iiie` + data);
			const tickerPresent = data.ticker !== undefined;

			//for (; symbolIndex < symbolsCount; ++symbolIndex) {
			let symbolObj:string;
			for (symbolObj in data.Data) {
				const symbolName = data.Data[symbolObj]['CoinName'];
				const listedExchange = 'CRYPTOCOMPARE';//extractField(data, 'exchange-listed', symbolIndex);
				const tradedExchange = 'CRYPTOCOMPARE';//extractField(data, 'exchange-traded', symbolIndex);
				const fullName = tradedExchange + ':' + symbolName;

				const ticker = data.Data[symbolObj]['Name']; //tickerPresent ? (data.Data[symbolObj]['Name'] as string) : symbolName;
					//https://github.com/tradingview/charting_library/wiki/Symbology#
				const symbolInfo: LibrarySymbolInfo = {
					ticker: ticker,
					name: symbolName,
					base_name: [listedExchange + ':' + symbolName],
					full_name: data.Data[symbolObj]['FullName'], //extractField(data["Data"][symbolObj], 'FullName', -1),
					listed_exchange: listedExchange,
					exchange: tradedExchange,
					description: data.Data[symbolObj]['FullName'], //extractField(data.["Data"][symbolObj], 'FullName', -1),
					has_intraday: true, //definedValueOrDefault(extractField(data, 'has-intraday', symbolIndex), true),
					has_no_volume: false, //definedValueOrDefault(extractField(data, 'has-no-volume', symbolIndex), false),
					minmov: 1,//extractField(data, 'minmovement', symbolIndex) || extractField(data, 'minmov', symbolIndex) || 0,
					minmove2: 0,//extractField(data, 'minmove2', symbolIndex) || extractField(data, 'minmov2', symbolIndex),
					fractional: false,
					pricescale: 100,//extractField(data, 'pricescale', symbolIndex), //2 decimali
					type: 'crypto',//extractField(data, 'type', symbolIndex),
					session: '24x7',//extractField(data, 'session-regular', symbolIndex),
					timezone: 'Etc/UTC',
					supported_resolutions: this._datafeedSupportedResolutions, //In case of absence of supported_resolutions in a symbol info all DWM resolutions will be available (ricavate da minuti o secondi). Intraday resolutions will be available if has_intraday is true.
					force_session_rebuild: true, //extractField(data, 'force-session-rebuild', symbolIndex),
					has_daily: true, //definedValueOrDefault(extractField(data, 'has-daily', symbolIndex), true), //true = fornito dall'api, false = ricavato dai minuti
					intraday_multipliers: ['1','5','60'], //definedValueOrDefault(extractField(data, 'intraday-multipliers', symbolIndex), ['1','60']), // forniti dall'api 1 e 60 gli altri sono ricavati (moltiplicando) da questi //https://github.com/tradingview/charting_library/wiki/Symbology#intraday_multipliers
					has_weekly_and_monthly: false, //true = fornito dall'api, false = ricavato dai giorni
					has_empty_bars: true,
					volume_precision: 0, //definedValueOrDefault(extractField(data, 'volume-precision', symbolIndex), 0),
				};

				this._symbolsInfo[ticker] = symbolInfo;
				this._symbolsInfo[symbolName] = symbolInfo;
				this._symbolsInfo[fullName] = symbolInfo;

				this._symbolsList.push(symbolName);
			}
		} catch (error) {
			throw new Error(`SymbolsStorage: API error when processing exchange ${exchange} symbol #${symbolIndex} (${data.Data[symbolIndex]}): ${error.message}`);
		}
	}
}

function definedValueOrDefault<T>(value: T | undefined, defaultValue: T): T {
	return value !== undefined ? value : defaultValue;
}
