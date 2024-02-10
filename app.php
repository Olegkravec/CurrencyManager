<?php

use App\ApiClients\Lookup\LookupApiClient;
use App\ApiClients\Rates\ExchangeRateApiClient;
use App\App;
use App\Cli\Runner;

require 'vendor/autoload.php';

App::setLookupApiClient(new LookupApiClient());
App::setExchangeRateApiClient(new ExchangeRateApiClient());

Runner::run($argv[1]);

