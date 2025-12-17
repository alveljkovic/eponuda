<?php

namespace App\Services\Crawler;

use App\Interfaces\CrawlerInterface;

class Crawler implements CrawlerInterface
{
    /**
     * Crawl URL using Playwright
     *
     * @param string $url
     * @return string
     */
    public static function crawl(string $url): string
    {
        // Build command
        // cloudflare protection bypass using playwright
        $command = "node " . base_path('resources/js/playwright/fetch.js') . " " . escapeshellarg($url);

        $output = [];
        $return_var = null;

        exec($command, $output, $return_var);

        if ($return_var !== 0) {
            return '';
        }

        $html = implode("\n", $output);

        return $html;
    }
}
