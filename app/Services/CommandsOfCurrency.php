<?php

namespace App\Services;

use App\Http\Requests\ConvertCurrencyRequest;
use App\Models\Currency;
use Illuminate\Support\Facades\Http;

class CommandsOfCurrency
{
    public function getXmlOfCB(): \SimpleXMLElement
    {
        $xmlOfBank = Http::get('http://www.cbr.ru/scripts/XML_daily.asp', [
            'date_req=' => date("d/m/Y")
        ]);
        return simplexml_load_string($xmlOfBank->body());
    }

    public function getDataOfCB(\SimpleXMLElement $xmlOfCurrency): string
    {
        return date('Y-m-d H:i:s', strtotime($xmlOfCurrency['Date']));
    }

    public function getArrayOfCurrency(\SimpleXMLElement $xmlOfCurrency): array
    {
        $arrayAllCurrency = [];
        foreach ($xmlOfCurrency as $currency) {
            $arrayAllCurrency[(string)$currency->CharCode] = str_replace(',', '.', (string)$currency->Value);
        }
        return $arrayAllCurrency;
    }

    public function filterOfCurrency(array $arrayAllCurrency): array
    {
        return [
            'USD' => $arrayAllCurrency["USD"],
            'EUR' => $arrayAllCurrency["EUR"],
            'GBP' => $arrayAllCurrency["GBP"]
        ];
    }

    public function updateOrCreateCurrency(array $arrayOfQueryCurrency, string $data): void
    {
        foreach ($arrayOfQueryCurrency as $key => $value) {
            Currency::updateOrCreate(
                [
                    'name' => $key
                ],
                [
                    'value' => $value,
                    'cb_update_at' => $data
                ]);
        }
    }

    public function getValue(string $currencyName): float
    {
        $currencyValue = 1;
        if (!$currencyName == 'RUB')
        {
            $currencyValue = Currency::query()
            ->where("name", "=", $currencyName)
            ->first()
            ->value;
        }
        return $currencyValue;
    }

    public function getBaseValue(string $currencyName): float
    {
        return $this->getBaseValue($currencyName);
    }

    public function getConvertedValue(string $currencyName): float
    {
        return $this->getBaseValue($currencyName);
    }
}
