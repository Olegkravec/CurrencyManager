<?php

namespace Tests\FeeEstimation\Interfaces;

use App\ApiClients\Rates\ExchangeRateApiClientInterface;
use App\Helpers\Utils;
use App\Models\Rates\CurrencyRatesDto;

class ExchangeRateApiClientTest implements ExchangeRateApiClientInterface
{

    public function get(): CurrencyRatesDto
    {
        $s_ = Utils::pathSplitter();

        $parsed = json_decode(
            file_get_contents(__DIR__."$s_..{$s_}json{$s_}exchangeratesapi_result_test.json"),
            true
        );

        return CurrencyRatesDto::fromArray($parsed);
    }
}