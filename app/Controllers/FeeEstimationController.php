<?php

namespace App\Controllers;

use App\App;
use App\Helpers\Utils;
use App\Models\CustomFloat;
use App\Models\InputCliDto;

class FeeEstimationController
{
    /**
     * @param InputCliDto $dto
     * @return CustomFloat
     * @throws \JsonMapper_Exception
     */
    public static function estimate(InputCliDto $dto) : CustomFloat{
        $cardInfo = App::getLookupApiClient()->get($dto->getBin());
        $isEu = Utils::isEu($cardInfo->getCountry()->getAlpha2());

        $response = App::getExchangeRateApiClient()->get();
        $rate = $response->getRateFor($dto->getCurrency());

        if($dto->getCurrency() == 'EUR' or $rate == 0)
            $fee = $dto->getAmount();
        else
            $fee = $dto->getAmount() / $rate;

        return new CustomFloat($fee * (($isEu) ? 0.01 : 0.02));
    }

}