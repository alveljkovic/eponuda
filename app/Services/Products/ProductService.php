<?php

namespace App\Services\Products;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;

class ProductService
{
    /**
     * Store products in chunks
     *
     * @param array $products
     * @param int $chunk
     * @return void
     */
    public function store(array $products): void
    {
        $chunk = Config::get('shoptok.chunk_size', 100);
        $collection = collect($products);

        $collection->chunk($chunk)->each(function (Collection $chunkSize) {
            Product::upsert(
                $chunkSize->toArray(),
                ['name', 'slug'],
                ['product_url', 'image_url', 'price', 'category_id', 'description']
            );
        });
    }
}
