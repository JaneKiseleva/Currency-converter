<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConvertCurrencyRequest;
use App\Models\Currency;
use App\Services\CommandsOfCurrency;
use App\Services\ConverterOfCurrency;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{

    public function getActualCurrency(): JsonResponse
    {
        $queryDBCurrency = Currency::all();
        $arrayOfCurrency = [];
        foreach ($queryDBCurrency as $currency)
        {
            $data = $currency->cb_update_at;
            $arrayOfCurrency[$currency->name] = $currency->value;
        }
        return response()->json(
            [
                'data' => $data,
                'currency' => $arrayOfCurrency,
            ]);
    }

    public function getConvertCurrency(ConvertCurrencyRequest $request, ConverterOfCurrency $convert, CommandsOfCurrency $service): JsonResponse
    {

        $baseCurrencyValue = $service->getValue($request->input('from'));
        $currencyToConvertValue = $service->getValue($request->input('to'));

        $convertSum = $convert
            ->convert($baseCurrencyValue, $currencyToConvertValue, $request->input("sum"));

        return response()->json([
            'convertSum' => $convertSum,
        ]);
    }
}





//
//$request->validate(
//    [
//        'from' => 'required|exists:App\Models\Currency,name',
//        'to' => 'required|exists:App\Models\Currency,name',
//        'sum' => 'required|integer|size:10'
//    ]);




//        //положили в переменные значения из объекта
//        $from = $request->input("from");
//        $to = $request->input("to");
//        $sum = $request->input("sum");





//        $validator = Validator::make(request()->all(), [
//            'name' => [
//                'required',
//                Rule::in(['USD', 'EUR', 'GBP', 'RUB'])
//            ],
//            [
//               'sum' => 'numeric', 'integer|size:10'
//            ]
//        ]);
//        return $validator->validated();


        //USD
        //EUR
        //500

        //1 USD = 70 рублей.
        //1 EUR = 80 рублей
        // соотношение USD/EUR = 70/80 = 0,875
        // конвертация = 500 * 0,875 = 437,5
        // итог = 437,5 EUR

        //---

        //RUB
        //EUR
        //200

        //1 RUB = 1 рубль
        //1 EUR = 80 рублей
        // соотношение RUB/EUR = 1/80 = 0,0125
        // конвертация = 200 * 0,0125 = 2,5
        // итог = 2,5 EUR




