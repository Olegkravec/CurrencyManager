<?php

namespace App\ApiClients\Lookup;


use App\App;
use App\Models\Lookup\CardInfoDto;

class LookupApiClient implements LookupApiClientInterface
{
    /**
     * @param string $country_code
     * @return CardInfoDto
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonMapper_Exception
     */
    public function get(string $country_code) : CardInfoDto
    {
        $response = App::getApiClient()
            ->request('GET',
                'https://lookup.binlist.net/' . $country_code
            );

        if($response->getStatusCode() >= 300)
            throw new \Exception("Lookup returned bad response, check API");


        return App::getJsonMapper()
            ->map(
                json_decode(
                    $response
                        ->getBody()
                        ->getContents()
                ),
                new CardInfoDto()
            );
    }
}