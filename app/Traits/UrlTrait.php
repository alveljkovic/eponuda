<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait UrlTrait
{
    /**
     * Build a full URL from a base URL and a path.
     *
     * @param string $baseUrl
     * @param string $path
     * @return string
     */
    public static function buildUrl(string $baseUrl, string $path): string
    {
        return rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
    }

    /**
     * Build pagination URLs for a category.
     *
     * @param string $categoryUrl
     * @param int $pages
     * @return array
     */
    public static function buildPaginationUrls(string $categoryUrl, int $pages): array
    {
        $urls = [
            $categoryUrl
        ];

        for ($i = 2; $i <= $pages; $i++) {
            $urls[] = "{$categoryUrl}?page={$i}";
        }

        return $urls;
    }
}
