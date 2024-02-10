<?php

namespace Tests\FeeEstimation;

use App\App;
use App\Controllers\FeeEstimationController;
use App\Factories\InputDataFactory;
use PHPUnit\Framework\TestCase;
use Tests\FeeEstimation\Interfaces\ExchangeRateApiClientTest;
use Tests\FeeEstimation\Interfaces\LookupApiClientTest;
use function PHPUnit\Framework\assertSame;

class FeeEstiomationControllerTest extends TestCase
{

    /**
     * "valid fee" => [transaction details]
     *
     * @var array|array[]
     *
     */
    private array $validArray = [
        "23.42" => ["bin" => "4745030", "amount" => "2000.00", "currency" => "GBP"],
        "1.21"  => ["bin" => "41417360", "amount" => "130.00", "currency" => "USD"],
        "1"     => ["bin" => "45717360", "amount" => "100.00", "currency" => "EUR"],
        "0.62"  => ["bin" => "45417360", "amount" => "10000.00", "currency" => "JPY"],
        "0.46"  => ["bin" => "516793", "amount" => "50.00", "currency" => "USD"]
    ];

    protected function setUp(): void
    {
        parent::setUp();

        App::setLookupApiClient(new LookupApiClientTest());
        App::setExchangeRateApiClient(new ExchangeRateApiClientTest());
    }


    public function testValidFee(){
        foreach ($this->validArray as $trueFee => $transaction){
            $dto = InputDataFactory::arrayToDto($transaction);
            $endFee = FeeEstimationController::estimate($dto);

            echo "\nEnd fee estimated for " . $dto->getCurrency() . " is $endFee";
            assertSame((float)$trueFee, round($endFee->toFloat(), 2));
        }
    }
}