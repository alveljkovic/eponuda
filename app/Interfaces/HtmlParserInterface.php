<?php

namespace App\Interfaces;

interface HtmlParserInterface
{
    /**
     * HTML parser method
     *
     * @param string $html
     * @param integer $categoryId
     * @return array
     */
    public static function parse(string $html, int $categoryId): array;
}
