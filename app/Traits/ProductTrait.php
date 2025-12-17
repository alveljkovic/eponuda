<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait ProductTrait
{
    /**
     * Prepare product name for slug.
     *
     * @param string $baseUrl
     * @param string $path
     * @return string
     */
    public static function normalizeName(string $name): string
    {
        return Str::of($name)
            ->lower()
            ->replace(['"', "'", '(', ')'], '')
            ->replaceMatches('/\s+/', ' ')
            ->trim();
    }

    /**
     * Prepare price
     *
     * @param string $price
     * @return float
     */
    public static function normalizePrice(string $price): float
    {
        $price = str_replace(['.', '€', ' '], '', $price);
        $price = str_replace(',', '.', $price);

        return (float) $price;
    }
}
