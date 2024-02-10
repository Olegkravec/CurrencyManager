<?php

namespace App\Cli;

use App\ApiClients\Lookup\LookupApiClient;
use App\ApiClients\Rates\ExchangeRateApiClient;
use App\App;
use App\Controllers\FeeEstimationController;
use App\Factories\InputDataFactory;
use App\Helpers\Utils;

class Runner
{
    /**
     * @param $input_filename
     * @return void
     * @throws \JsonMapper_Exception
     */
    public static function run($input_filename){
        $file = file_get_contents($input_filename);
        $inputs = InputDataFactory::parseAll($file);

        foreach ($inputs as $dto){
            $endFee = FeeEstimationController::estimate($dto);

            echo "\nEnd fee for " . $dto->getCurrency() . " is $endFee";
        }
    }
}