<?php

namespace App\Services\Html;

use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;
use App\Traits\ProductTrait;
use App\Interfaces\HtmlParserInterface;

class ShoptokParser implements HtmlParserInterface
{
    use ProductTrait;

    /**
     * Parse HTML and extract products
     *
     * @param string $html
     * @param int $categoryId
     * @return array
     */
    public static function parse(string $html, int $categoryId): array
    {
        $crawler = new Crawler($html);

        $products = [];

        $crawler->filter('.product.b-paging-product.b-paging-product--vertical.p-paging')->each(
            function (Crawler $node) use (
                &$products,
                $categoryId
            ) {
                // skip direct prodavac products
                if (!str_starts_with($node->filter('a.b-paging-product__btn')->attr('href'), '/link')) {
                    $name = trim($node->filter('h3.l3-product-title')->text());
                    $slug = Str::slug(self::normalizeName($name));
                    $productUrl = $node->filter('a.b-paging-product__btn')->attr('href');

                    $imageUrl = $node->filter('img')->count()
                        ? $node->filter('img')->attr('src')
                        : null;

                    $priceText = $node->filter('.b-paging-product__price b')->text();
                    $price = self::normalizePrice($priceText);

                    $slug = Str::slug($name);

                    $products[] = [
                        'name'        => $name,
                        'slug'        => $slug,
                        'product_url' => $productUrl,
                        'image_url'   => $imageUrl,
                        'price'       => $price,
                        'category_id' => $categoryId,
                        'description' => null,
                    ];
                }
            }
        );

        return $products;
    }
}
