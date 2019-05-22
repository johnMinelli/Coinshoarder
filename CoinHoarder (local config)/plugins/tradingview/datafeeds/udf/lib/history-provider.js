import { getErrorMessage, } from './helpers';
var HistoryProvider = /** @class */ (function () {
    function HistoryProvider(datafeedUrl, api_key, requester) {
        this._datafeedUrl = datafeedUrl;
        this._api_key = api_key;
        this._requester = requester;
    }
    HistoryProvider.prototype.getBars = function (symbolInfo, resolution, rangeStartDate, rangeEndDate) {
        var _this = this;
        var time = "histoday";
        var mult = 86400;
        var aggregate = 1;
        var nomoredata = false;
        if (resolution == "60") {
            time = "histohour";
            mult = 3600;
        }
        else if (resolution != "D") {
            time = "histominute";
            mult = 60;
            if (resolution == "5") {
                aggregate = 5;
            }
            else if (resolution == "15") {
                aggregate = 15;
            }
            else if (resolution == "30") {
                aggregate = 30;
            }
            //fix per toTs limitato a 7 giorni di storia
            if ((Date.now() / 1000) - rangeStartDate > 604800 + 100000) {
                //lascio che vada in errore
                nomoredata = true;
            }
            else if ((Date.now() / 1000) - rangeEndDate > 604800) {
                rangeStartDate += Math.floor(Date.now() / 1000) - 600000 - rangeEndDate;
                rangeEndDate = Math.floor(Date.now() / 1000) - 600000;
            }
        }
        var start = rangeStartDate;
        var end = rangeEndDate;
        var limit = Math.floor((rangeEndDate - rangeStartDate) / mult);
        var requestParams = {
            fsym: symbolInfo.ticker || '',
            tsym: 'USD',
            toTs: rangeEndDate,
            limit: limit,
            api_key: this._api_key,
        };
        if (nomoredata) {
            return new Promise(function (resolve, reject) {
                var barsWrap = [];
                var meta = {
                    noData: true,
                };
                resolve({
                    bars: barsWrap,
                    meta: meta,
                });
            });
        }
        else if (limit > 2000) {
            //caso grosso
            requestParams.limit = 2000;
            requestParams.toTs = Math.max((2000 * mult) + rangeStartDate, 1280000000);
            return new Promise(function (resolve, reject) {
                var barsWrap = [];
                var meta = {
                    noData: false,
                };
                _this._requester.sendRequest(_this._datafeedUrl, 'data/' + time, requestParams)
                    .then(function (response) {
                    if (response.Response !== "Success" && response.Response !== "Error") {
                        reject(response.Message);
                        return;
                    }
                    if (response.Response === 'Error') {
                        meta.noData = true;
                        meta.nextTime = rangeStartDate;
                    }
                    else {
                        var volumePresent = response.Data[0].volumefrom !== undefined;
                        var ohlPresent = response.Data[0].open !== undefined;
                        for (var i = 0; i < response.Data.length; ++i) {
                            var barValue = {
                                time: response.Data[i].time * 1000,
                                close: Number(response.Data[i].close),
                                open: Number(response.Data[i].close),
                                high: Number(response.Data[i].close),
                                low: Number(response.Data[i].close),
                            };
                            if (ohlPresent) {
                                barValue.open = Number(response.Data[i].open);
                                barValue.high = Number(response.Data[i].high);
                                barValue.low = Number(response.Data[i].low);
                            }
                            if (volumePresent) {
                                barValue.volume = Number(response.Data[i].volumefrom);
                            }
                            barsWrap.push(barValue);
                        }
                    }
                    _this.getBars(symbolInfo, resolution, Math.max((2000 * mult) + rangeStartDate, 1280000000), rangeEndDate).then(function (bars) {
                        resolve({
                            bars: barsWrap.concat(bars.bars),
                            meta: meta,
                        });
                    });
                })
                    .catch(function (reason) {
                    var reasonString = getErrorMessage(reason);
                    console.warn("HistoryProvider: getBars() failed, error=" + reasonString);
                    reject(reasonString);
                });
            });
        }
        else {
            //caso standard
            return new Promise(function (resolve, reject) {
                var barsWrap = [];
                var meta = {
                    noData: false,
                };
                _this._requester.sendRequest(_this._datafeedUrl, 'data/' + time, requestParams)
                    .then(function (response) {
                    if (response.Response !== "Success" && response.Response !== "Error") {
                        reject(response.Message);
                        return;
                    }
                    if (response.Response === 'Error') {
                        meta.noData = true;
                        meta.nextTime = rangeStartDate;
                    }
                    else {
                        var volumePresent = response.Data[0].volumefrom !== undefined;
                        var ohlPresent = response.Data[0].open !== undefined;
                        for (var i = 0; i < response.Data.length; ++i) {
                            var barValue = {
                                time: response.Data[i].time * 1000,
                                close: Number(response.Data[i].close),
                                open: Number(response.Data[i].close),
                                high: Number(response.Data[i].close),
                                low: Number(response.Data[i].close),
                            };
                            if (ohlPresent) {
                                barValue.open = Number(response.Data[i].open);
                                barValue.high = Number(response.Data[i].high);
                                barValue.low = Number(response.Data[i].low);
                            }
                            if (volumePresent) {
                                barValue.volume = Number(response.Data[i].volumefrom);
                            }
                            barsWrap.push(barValue);
                        }
                    }
                    resolve({
                        bars: barsWrap,
                        meta: meta,
                    });
                })
                    .catch(function (reason) {
                    var reasonString = getErrorMessage(reason);
                    console.warn("HistoryProvider: getBars() failed, error=" + reasonString);
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
    };
    return HistoryProvider;
}());
export { HistoryProvider };
