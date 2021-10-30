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

