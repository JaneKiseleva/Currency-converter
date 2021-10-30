<?php
declare(strict_types=1);
namespace Tests\Unit;

use App\Services\ConverterOfCurrency;
use DivisionByZeroError;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{

    private $converter;

    protected function setUp(): void
    {
        $this->converter = new ConverterOfCurrency();
    }

    protected function tearDown(): void
    {
        $this->converter = null;
    }

    public function addCurrencyProvider()
    {
        return [
            [140, 70, 1, 2],
            [140.0, 70, 1, 2],
            [-140, -70, 1, 2],
            [0, 70, 1, 0]
        ];
    }

    /**
     * @dataProvider addCurrencyProvider
     */
    public function testConvert($expected, $baseCurrencyValue, $currencyToConvertValue, $sum)
    {
        $result = $this->converter->convert($baseCurrencyValue, $currencyToConvertValue, $sum);
        $this->assertEquals($expected, $result);
    }

    public function test_exceptionOnZero()
    {
        $service = new ConverterOfCurrency();
        $this->expectException(DivisionByZeroError::class);
        $service->convert(0,0,0);
    }
}
