import {
	Bar,
	HistoryMetadata,
	LibrarySymbolInfo,
} from '../../../charting_library/datafeed-api';

import {
	getErrorMessage,
	RequestParams,
	UdfErrorResponse,
	UdfOkResponse,
	UdfResponse,
	CUdfErrorResponse,
	CUdfOkResponse,
	CUdfResponse,
	logMessage,
} from './helpers';

import { Requester } from './requester';

interface HistoryPartialDataResponse {
	time: number;
	close: number;
	open?: never;
	high?: never;
	low?: never;
	volumefrom?: never;
}

interface HistoryFullDataResponse {
	time: number;
	close: number;
	open: number;
	high: number;
	low: number;
	volumefrom: number;
}

interface HistoryNoDataResponse extends CUdfResponse {
	Response: 'no_data';
	nextTime?: number;
}

//type HistoryResponse = HistoryFullDataResponse | HistoryPartialDataResponse | HistoryNoDataResponse;

interface istoryResponse{
	Data: any;
	Message: any;
	Response: any;
}

type HistoryResponse = istoryResponse;

export interface GetBarsResult {
	bars: Bar[];
	meta: HistoryMetadata;
}

export class HistoryProvider {
	private _datafeedUrl: string;
	private _api_key: string;
	private readonly _requester: Requester;

	public constructor(datafeedUrl: string, api_key: string, requester: Requester) {
		this._datafeedUrl = datafeedUrl;
		this._api_key = api_key;
		this._requester = requester;
	}

	public getBars(symbolInfo: LibrarySymbolInfo, resolution: string, rangeStartDate: number, rangeEndDate: number): Promise<GetBarsResult> {
		let time = "histoday";
		let mult = 86400;
		let aggregate = 1;
		var nomoredata = false;
		if(resolution == "60"){
			time = "histohour";
			mult= 3600;
		}else if(resolution != "D"){
			time = "histominute";
			mult = 60;
			if(resolution == "5" ){
				aggregate = 5;
			}else if(resolution == "15" ){
				aggregate = 15;
			}else if(resolution == "30" ){
				aggregate = 30;
			}
			//fix per toTs limitato a 7 giorni di storia
			if ((Date.now() / 1000) - rangeStartDate > 604800 + 100000) {//timeframe insoddisfacibile
                 //lascio che vada in errore
                 nomoredata = true;
             }else if ((Date.now() / 1000) - rangeEndDate > 604800) {
			 	rangeStartDate += Math.floor(Date.now() / 1000)-600000 - rangeEndDate;
			 	rangeEndDate = Math.floor(Date.now() / 1000)-600000;
			 }
		}
		const start = rangeStartDate;
		const end = rangeEndDate;
		const limit = Math.floor((rangeEndDate-rangeStartDate)/mult);
		const requestParams: RequestParams = {//?fsym=BTC&tsym=GBP&limit=10
			fsym: symbolInfo.ticker || '',
			tsym: 'USD',
			toTs: rangeEndDate,
			limit: limit,
			api_key: this._api_key,
		};
		if(nomoredata){
			return new Promise((resolve: (result: GetBarsResult) => void, reject: (reason: string) => void) => {
				const barsWrap: Bar[] = [];
				const meta: HistoryMetadata = {
					noData: true,
				};
				resolve({
					bars: barsWrap,
					meta: meta,
				});
			});
		}else if(limit > 2000){
			//caso grosso
			requestParams.limit = 2000;
			requestParams.toTs = Math.max((2000*mult)+rangeStartDate,1280000000);
			return new Promise((resolve: (result: GetBarsResult) => void, reject: (reason: string) => void) => {
				const barsWrap: Bar[] = [];
				const meta: HistoryMetadata = {
					noData: false,
				};
				this._requester.sendRequest<HistoryResponse>(this._datafeedUrl, 'data/'+time, requestParams)
					.then((response: HistoryResponse | CUdfErrorResponse) => {
						if (response.Response !== "Success" && response.Response !== "Error") {
							reject(response.Message);
							return;
						}
						if (response.Response === 'Error') {
							meta.noData = true;
							meta.nextTime = rangeStartDate;
						} else{
							const volumePresent = response.Data[0].volumefrom !== undefined;
							const ohlPresent = response.Data[0].open !== undefined;

							for (let i = 0; i < response.Data.length; ++i) {
								const barValue: Bar = {
									time: response.Data[i].time * 1000,
									close: Number(response.Data[i].close),
									open: Number(response.Data[i].close),
									high: Number(response.Data[i].close),
									low: Number(response.Data[i].close),
								};
								if (ohlPresent) {
									barValue.open = Number((response.Data[i] as HistoryFullDataResponse).open);
									barValue.high = Number((response.Data[i] as HistoryFullDataResponse).high);
									barValue.low = Number((response.Data[i] as HistoryFullDataResponse).low);
								}
								if (volumePresent) {
									barValue.volume = Number((response.Data[i] as HistoryFullDataResponse).volumefrom);
								}
								barsWrap.push(barValue);
							}
						}
						this.getBars(symbolInfo, resolution, Math.max((2000*mult)+rangeStartDate,1280000000), rangeEndDate).then((bars: any)=>{
							resolve({
								bars: barsWrap.concat(bars.bars),
								meta: meta,
							});
						});
					})
					.catch((reason?: string | Error) => {
						const reasonString = getErrorMessage(reason);
						console.warn(`HistoryProvider: getBars() failed, error=${reasonString}`);
						reject(reasonString);
					});
			});
		}else {
			//caso standard
			return new Promise((resolve: (result: GetBarsResult) => void, reject: (reason: string) => void) => {
				const barsWrap: Bar[] = [];
				const meta: HistoryMetadata = {
					noData: false,
				};
				this._requester.sendRequest<HistoryResponse>(this._datafeedUrl, 'data/'+time, requestParams)
					.then((response: HistoryResponse | CUdfErrorResponse) => {
						if (response.Response !== "Success" && response.Response !== "Error") {
							reject(response.Message);
							return;
						}
						if (response.Response === 'Error') {
							meta.noData = true;
							meta.nextTime = rangeStartDate;
						} else{
							const volumePresent = response.Data[0].volumefrom !== undefined;
							const ohlPresent = response.Data[0].open !== undefined;

							for (let i = 0; i < response.Data.length; ++i) {
								const barValue: Bar = {
									time: response.Data[i].time * 1000,
									close: Number(response.Data[i].close),
									open: Number(response.Data[i].close),
									high: Number(response.Data[i].close),
									low: Number(response.Data[i].close),
								};
								if (ohlPresent) {
									barValue.open = Number((response.Data[i] as HistoryFullDataResponse).open);
									barValue.high = Number((response.Data[i] as HistoryFullDataResponse).high);
									barValue.low = Number((response.Data[i] as HistoryFullDataResponse).low);
								}
								if (volumePresent) {
									barValue.volume = Number((response.Data[i] as HistoryFullDataResponse).volumefrom);
								}
								barsWrap.push(barValue);
							}
						}
						resolve({
								bars: barsWrap,
								meta: meta,
							});

					})
					.catch((reason?: string | Error) => {
						const reasonString = getErrorMessage(reason);
						console.warn(`HistoryProvider: getBars() failed, error=${reasonString}`);
						reject(reasonString);
					});
				});
			}


/*
			this._requester.sendRequest<HistoryResponse>(this._datafeedUrl, 'data/'+time, requestParams)
				.then((response: HistoryResponse | CUdfErrorResponse) => {
					if (response.Response !== "Success" && response.Response !== "Error") {
						reject(response.Message);
						return;
					}
					const bars: Bar[] = [];
					const meta: HistoryMetadata = {
						noData: false,
					};

					if (response.Response === 'Error') {
						meta.noData = true;
						meta.nextTime = rangeStartDate;
					} else {
						const volumePresent = response.Data[0].volumefrom !== undefined;
						const ohlPresent = response.Data[0].open !== undefined;

						for (let i = 0; i < response.Data.length; ++i) {
							const barValue: Bar = {
								time: response.Data[i].time * 1000,
								close: Number(response.Data[i].close),
								open: Number(response.Data[i].close),
								high: Number(response.Data[i].close),
								low: Number(response.Data[i].close),
							};

							if (ohlPresent) {
								barValue.open = Number((response.Data[i] as HistoryFullDataResponse).open);
								barValue.high = Number((response.Data[i] as HistoryFullDataResponse).high);
								barValue.low = Number((response.Data[i] as HistoryFullDataResponse).low);
							}

							if (volumePresent) {
								barValue.volume = Number((response.Data[i] as HistoryFullDataResponse).volumefrom);
							}

							bars.push(barValue);
						}
					}

					resolve({
						bars: bars,
						meta: meta,
					});
				})
				.catch((reason?: string | Error) => {
					const reasonString = getErrorMessage(reason);
					console.warn(`HistoryProvider: getBars() failed, error=${reasonString}`);
					reject(reasonString);
				});*/
		}
}
