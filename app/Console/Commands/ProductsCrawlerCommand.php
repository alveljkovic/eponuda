<?php

namespace App\Console\Commands;

use App\Jobs\ProductsCrawlerJob;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use App\Traits\UrlTrait;
use App\Services\Html\ShoptokParser;

class ProductsCrawlerCommand extends Command
{
    use UrlTrait;

    /**
     * Crawl products command signature.
     *
     * @var string
     */
    protected $signature = 'crawl:products {--init : Init products crawl flag}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl products from Shoptok';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $baseUrl = Config::get('shoptok.base_url');

        $shop = ($this->option('init')) ?
            Config::get('crawler.init') :
            Config::get('crawler.shoptok');

        if (empty($shop)) {
            $this->error('No Shop found!');
            return 0;
        }

        $paginationUrls = [];
        $output = [];
        foreach ($shop['category_urls'] as $categoryId => $urlPart) {
            $url = UrlTrait::buildUrl($baseUrl, $urlPart);
            $pages = $shop['pages'][$categoryId];
            // here we build all pagination URLs
            // used for host's pagination pages
            $paginationUrls = UrlTrait::buildPaginationUrls($url, $pages);

            foreach ($paginationUrls as $pageUrl) {
                // dispatch job for each pagination URL
                ProductsCrawlerJob::dispatch($categoryId, $pageUrl);
                $output[] = [
                    $categoryId,
                    $pageUrl
                ];
            }
        }

        $this->table(['Category ID', 'URL'], $output);
    }
}
