<?php

namespace App\Interfaces;

interface CrawlerInterface
{
    /**
     * Crawl url
     *
     * @param string $url
     * @return string
     */
    public static function crawl(string $url): string;
}
