<?php

namespace App\Factories;

use App\Models\InputCliDto;

class InputDataFactory
{

    /**
     * @param $input
     * @return InputCliDto
     */
    public static function arrayToDto($input): InputCliDto
    {
        return InputCliDto::fromArray($input);
    }


    /**
     * @param string $input
     * @return InputCliDto[]
     */
    public static function parseAll(string &$input) : array{
        $parsed = [];
        foreach (explode("\n", $input) as $line){
            if(empty($line))
                continue;

            $parsed[] = self::arrayToDto(json_decode($line, true));
        }
        return $parsed;
    }

}