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
        $this->converter = NULL;
    }

    public function addDataProvider()
    {
        return array(
            array(140, 70, 1, 2),
            array(140.0, 70, 1, 2),
            array(-140, -70, 1, 2),
            array(0, 70, 1, 0)
        );
    }

    /**
     * @dataProvider addDataProvider
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

//
//    public function test_convert() {
//        $service = new ConverterOfCurrency();
//        $this->assertEquals(140, $service->convert(70, 1, 2));
//    }

//    //------------------------------------------------expected
//
//    //OK (1 test, 1 assertion)
//    public function test_convert_expected_float() {
//        $service = new ConverterOfCurrency();
//        $this->assertEquals(140.0, $service->convert(70, 1, 2));
//    }

    //----------------------------------------------baseCurrencyValue


//    //OK (1 test, 1 assertion)
//    public function test_convert_baseCurrencyValue_null() {
//        $service = new ConverterOfCurrency();
//        $this->assertEquals(0, $service->convert(0, 1, 2));
//    }

//    //OK (1 test, 1 assertion)
//    public function test_convert_baseCurrencyValue_negative_number() {
//        $service = new ConverterOfCurrency();
//        $this->assertEquals(-140, $service->convert(-70, 1, 2));
//    }

    //----------------------------------------------currencyToConvertValue


//    //ERRORS!
//    public function test_convert_sum_float() {
//        $service = new ConverterOfCurrency();
//        $this->assertEquals(140.0, $service->convert(70, 1, 2.9));
//    }

//    //OK (1 test, 1 assertion)
//    public function test_convert_sum_negative_number() {
//        $service = new ConverterOfCurrency();
//        $this->assertEquals(-140, $service->convert(70, 1, -2));
//    }
//
//    //OK (1 test, 1 assertion)
//    public function test_convert_sum_null() {
//        $service = new ConverterOfCurrency();
//        $this->assertEquals(0, $service->convert(70, 1, 0));
//    }

//}
