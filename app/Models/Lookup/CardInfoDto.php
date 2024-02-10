<?php

namespace App\Models\Lookup;

class CardInfoDto
{
    public CardNumberDto $number;
    public string $scheme;
    public string $type;
    public string $brand;
    public bool $prepaid;
    public CountryDto $country;
    public BankDto $bank;

    public function getNumber(): CardNumberDto
    {
        return $this->number;
    }

    public function setNumber(CardNumberDto $number): void
    {
        $this->number = $number;
    }

    public function getScheme(): string
    {
        return $this->scheme;
    }

    public function setScheme(string $scheme): void
    {
        $this->scheme = $scheme;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function isPrepaid(): bool
    {
        return $this->prepaid;
    }

    public function setPrepaid(bool $prepaid): void
    {
        $this->prepaid = $prepaid;
    }

    public function getCountry(): CountryDto
    {
        return $this->country;
    }

    public function setCountry(CountryDto $country): void
    {
        $this->country = $country;
    }

    public function getBank(): BankDto
    {
        return $this->bank;
    }

    public function setBank(BankDto $bank): void
    {
        $this->bank = $bank;
    }
}