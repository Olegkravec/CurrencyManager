<?php

namespace App\ApiClients\Rates;

use App\Models\Rates\CurrencyRatesDto;

interface ExchangeRateApiClientInterface
{

    public function get() : CurrencyRatesDto;
}