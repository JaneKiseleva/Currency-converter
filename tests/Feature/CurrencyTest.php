<?php

namespace Tests\Feature;

use App\Services\CommandsOfCurrency;
use Mockery\MockInterface;
use Tests\TestCase;
use Mockery as m;

class CurrencyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function tearDown():void
    {
        m::close();
    }

    public function test_structure()
    {
        $response = $this->get('/api/actual');

        $response->assertJsonStructure([
            "data",
            "currency"=> [
                "USD",
                "EUR",
                "GBP"
            ]]);
    }

    //OK (1 test, 1 assertion)
    public function test_validate()
    {
        $response = $this->postJson('/api/convert',
            [
            "from" => "USD",
            "to"=> "EUR",
            "sum"=> 15
            ]);
        $response
            ->assertStatus(200);
    }

    //OK (1 test, 1 assertion)
    public function test_validate_from()
    {
        $response = $this->postJson('/api/convert',
            [
                "from" => "UYY",
                "to"=> "EUR",
                "sum"=> 0
            ]);
        $response
            ->assertStatus(422);
    }

    //OK (1 test, 1 assertion)
    public function test_validate_to()
    {
        $response = $this->post('/api/convert',
            [
                "from" => "USD",
                "to"=> "EUR",
                "sum"=> 0
            ]);
        $response
            ->assertStatus(200);
    }

    //OK (1 test, 1 assertion)
    public function test_validate_sum_negative_number()
    {
        $response = $this->post('/api/convert',
            [
                "from" => "USD",
                "to"=> "EUR",
                "sum"=> -5
            ]);
        $response
            ->assertStatus(200);
    }

    public function test_mok()
    {
        $this->instance(
            CommandsOfCurrency::class,
            m::mock(CommandsOfCurrency::class, function (MockInterface $mock) {
                $mock
                    ->shouldReceive('getValue')
                    ->andReturn(10, 1);
            })
        );
        $response = $this
            ->post('/api/convert',
        [
            "from" => "USD",
            "to"=> "RUB",
            "sum"=> 700
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'convertSum' => 7000,
            ]);
    }
}


//    public function test_actual()
//    {
//        $response = $this->get('/api/actual');
//
//        $response->assertJson([
//            "data" => "2021-10-28",
//            "currency"=> [
//                "USD" => "69.81",
//                "EUR" => "81.03",
//                "GBP" => "95.98"
//            ]]);
//    }
