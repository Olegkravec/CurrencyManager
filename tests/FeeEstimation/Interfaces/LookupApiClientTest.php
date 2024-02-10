<?php

namespace Tests\FeeEstimation\Interfaces;

use App\ApiClients\Lookup\LookupApiClientInterface;
use App\App;
use App\Helpers\Utils;
use App\Models\Lookup\CardInfoDto;

class LookupApiClientTest extends \App\ApiClients\Lookup\LookupApiClient implements LookupApiClientInterface
{

    public function get(string $country_code): CardInfoDto
    {
        $s_ = Utils::pathSplitter();
        return App::getJsonMapper()
            ->map(
                json_decode(
                    file_get_contents(__DIR__."$s_..{$s_}json{$s_}lookup_result_test.json")
                ),
                new CardInfoDto()
            );
    }
}