<?php

namespace App\Models\Rates;

class CurrencyRatesDto
{
    private bool $success;
    private int $timestamp;
    private string $base;
    private string $date;
    private array $rates;

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function setSuccess(bool $success): void
    {
        $this->success = $success;
    }

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    public function setTimestamp(int $timestamp): void
    {
        $this->timestamp = $timestamp;
    }

    public function getBase(): string
    {
        return $this->base;
    }

    public function setBase(string $base): void
    {
        $this->base = $base;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function getRates(): array
    {
        return $this->rates;
    }


    public function getRateFor($countryCode): float
    {
        return $this->rates[$countryCode];
    }



    public function setRates(array $rates): void
    {
        $this->rates = $rates;
    }

    /**
     * @param array $data
     * @return CurrencyRatesDto
     */
    public static function fromArray(array $data): CurrencyRatesDto
    {
        $dto = new self();
        $dto->setSuccess($data['success']);
        $dto->setTimestamp($data['timestamp']);
        $dto->setBase($data['base']);
        $dto->setDate($data['date']);
        $dto->rates = self::mapRates($data['rates']);
        return $dto;
    }

    /**
     * @param array $rates
     * @return array
     */
    private static function mapRates(array $rates): array
    {
        $mappedRates = [];
        foreach ($rates as $currency => $rate) {
            $mappedRates[$currency] = $rate;
        }
        return $mappedRates;
    }
}