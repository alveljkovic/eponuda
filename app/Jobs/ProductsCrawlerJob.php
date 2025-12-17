<?php

namespace App\Jobs;

use App\Models\Category;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use App\Services\Crawler\Crawler;
use App\Services\Html\ShoptokParser;
use App\Services\Products\ProductService;

class ProductsCrawlerJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Number of attempts
     *
     * @var integer
     */
    public $tries = 3;

    /**
     * Category ID
     *
     * @var integer
     */
    protected int $categoryId;

    /**
     * Category url
     *
     * @var string
     */
    protected string $url;

    /**
     * Create a new job instance.
     */
    public function __construct(int $categoryId, string $url)
    {
        $this->categoryId = $categoryId;
        $this->url = $url;
    }

    /**
     * Execute the job.
     */
    public function handle(ProductService $productService): void
    {
        $category = Category::find($this->categoryId);

        if (!$category) {
            Log::error('Category ID does not exists!', [
                'category_id' => $this->categoryId,
            ]);
        } else {
            try {
                // Crawl url
                $html = Crawler::crawl($this->url);

                // Parse DOM
                $products = ShoptokParser::parse($html, $this->categoryId);

                // Store Products
                $productService->store($products);

                // Log info
                Log::info('URL crawled:', [
                    'category_id' => $this->categoryId,
                    'url' => $this->url,
                ]);
            } catch (\Throwable $th) {
                Log::error('URL not crawled:', [
                    'category_id' => $this->categoryId,
                    'url' => $this->url,
                    'message' => $th->getMessage(),
                ]);
            }
        }
    }
}
