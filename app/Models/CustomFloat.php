<?php

namespace App\Models;

class CustomFloat
{

    private float $number;

    /**
     * @param float $number
     */
    public function __construct(float $number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)round($this->number, 2);
    }

    public function toFloat(){
        return (float)$this->number;
    }
}