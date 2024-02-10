<?php

namespace App\Models;

class InputCliDto
{
    private int $bin;
    private float $amount;
    private string $currency;

    public function getBin(): int
    {
        return $this->bin;
    }

    public function setBin(int $bin): void
    {
        $this->bin = $bin;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @param array $input
     * @return self
     */
    public static function fromArray(array $input){
        $dto = new self();
        $dto->setBin($input['bin']);
        $dto->setAmount($input['amount']);
        $dto->setCurrency($input['currency']);
        return $dto;
    }
}