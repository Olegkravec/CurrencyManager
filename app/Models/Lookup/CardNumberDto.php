<?php

namespace App\Models\Lookup;

class CardNumberDto
{
    public int $length;
    public bool $luhn;

    public function getLength(): int
    {
        return $this->length;
    }

    public function setLength(int $length): void
    {
        $this->length = $length;
    }

    public function isLuhn(): bool
    {
        return $this->luhn;
    }

    public function setLuhn(bool $luhn): void
    {
        $this->luhn = $luhn;
    }
}