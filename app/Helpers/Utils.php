<?php

namespace App\Helpers;

class Utils
{
    /**
     * @param $c
     * @return bool
     */
    public static function isEu($country_code): bool
    {
        $euCountries = [
            'AT', 'BE', 'BG', 'CY', 'CZ', 'DE', 'DK', 'EE', 'ES', 'FI',
            'FR', 'GR', 'HR', 'HU', 'IE', 'IT', 'LT', 'LU', 'LV', 'MT',
            'NL', 'PO', 'PT', 'RO', 'SE', 'SI', 'SK'
        ];

        return in_array($country_code, $euCountries);
    }

    /**
     * @return bool
     */
    public static function isWindows(): bool
    {
        return (strtoupper(substr(PHP_OS, 0, 3))) === 'WIN';
    }

    /**
     * @return string
     */
    public static function pathSplitter(): string
    {
        return (strtoupper(substr(PHP_OS, 0, 3))) === 'WIN'
                ? "\\" : '/';
    }
}