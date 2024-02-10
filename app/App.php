<?php

namespace App;

use App\ApiClients\Lookup\LookupApiClient;
use App\ApiClients\Lookup\LookupApiClientInterface;
use App\ApiClients\Rates\ExchangeRateApiClient;
use App\ApiClients\Rates\ExchangeRateApiClientInterface;
use App\Helpers\Utils;
use Dotenv\Dotenv;
use GuzzleHttp\Client;

/**
 * Initialise some singleton instances
 */
class App
{
    private static Dotenv $env;
    private static Client $apiClient;
    private static LookupApiClientInterface $lookupApiClient;
    private static ExchangeRateApiClientInterface $exchangeRateApiClient;
    private static \JsonMapper $jsonMapper;


    /**
     * @param string $key
     * @return string|null
     */
    public static function env(string $key) : ?string {
        if(empty(self::$env)){
            $dotenv = Dotenv::createImmutable(__DIR__ . Utils::pathSplitter() . ".." );
            $dotenv->load();
            self::$env = $dotenv;
        }
        return $_ENV[$key];
    }


    /**
     * @return Client
     */
    public static function getApiClient() : Client {
        if(empty(self::$apiClient)){
            self::$apiClient = new Client();
        }
        return self::$apiClient;
    }

    /**
     * @return \JsonMapper
     */
    public static function getJsonMapper() : \JsonMapper {
        if(empty(self::$jsonMapper)){
            self::$jsonMapper = new \JsonMapper();
        }
        return self::$jsonMapper;
    }

    public static function getLookupApiClient(): LookupApiClientInterface
    {
        return self::$lookupApiClient;
    }

    public static function setLookupApiClient(LookupApiClientInterface $lookupApiClient): void
    {
        self::$lookupApiClient = $lookupApiClient;
    }

    public static function getExchangeRateApiClient(): ExchangeRateApiClientInterface
    {
        return self::$exchangeRateApiClient;
    }

    public static function setExchangeRateApiClient(ExchangeRateApiClientInterface $exchangeRateApiClient): void
    {
        self::$exchangeRateApiClient = $exchangeRateApiClient;
    }


}