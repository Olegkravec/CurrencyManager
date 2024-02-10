<?php

namespace App\Models\Lookup;

class CountryDto
{
    public string $numeric;
    public string $alpha2;
    public string $name;
    public string $emoji;
    public string $currency;
    public int $latitude;
    public int $longitude;

    public function getNumeric(): string
    {
        return $this->numeric;
    }

    public function setNumeric(string $numeric): void
    {
        $this->numeric = $numeric;
    }

    public function getAlpha2(): string
    {
        return $this->alpha2;
    }

    public function setAlpha2(string $alpha2): void
    {
        $this->alpha2 = $alpha2;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmoji(): string
    {
        return $this->emoji;
    }

    public function setEmoji(string $emoji): void
    {
        $this->emoji = $emoji;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function getLatitude(): int
    {
        return $this->latitude;
    }

    public function setLatitude(int $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function getLongitude(): int
    {
        return $this->longitude;
    }

    public function setLongitude(int $longitude): void
    {
        $this->longitude = $longitude;
    }
}