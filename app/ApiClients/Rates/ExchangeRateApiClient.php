<?php

namespace App\ApiClients\Rates;

use App\App;
use App\Models\Lookup\CardInfoDto;
use App\Models\Rates\CurrencyRatesDto;
use GuzzleHttp\Client;

class ExchangeRateApiClient implements ExchangeRateApiClientInterface
{

    public function get() : CurrencyRatesDto
    {
        $response = App::getApiClient()
            ->request('GET',
                'http://api.exchangeratesapi.io/latest?access_key=' . App::env('API_EXCHANGERATES_KEY')
            );

        if($response->getStatusCode() >= 300)
            throw new \Exception("ExchangeRatesApi fail, please check request or ApiKey");

        $parsed = json_decode(
            $response->getBody()
                ->getContents(),
            true
        );

        return CurrencyRatesDto::fromArray($parsed);
    }
}