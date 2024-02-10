<?php

namespace App\ApiClients\Lookup;

use App\Models\Lookup\CardInfoDto;

interface LookupApiClientInterface
{

    /**
     * @return mixed
     */
    public function get(string $country_code) : CardInfoDto;

}