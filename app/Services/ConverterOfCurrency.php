<?php
declare(strict_types=1);
namespace App\Services;

class ConverterOfCurrency
{

    public function convert(float $baseCurrencyValue, float $currencyToConvertValue, int $sum): float
    {
        $ratio = $baseCurrencyValue / $currencyToConvertValue;
        return round($sum * $ratio, 2);
    }
}
