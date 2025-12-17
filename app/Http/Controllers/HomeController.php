<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
use App\Services\Breadcrumb\BreadcrumbService;
use Tighten\Ziggy\Ziggy;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * Homepage display
     *
     * @return Response
     */
    public function show(): Response
    {
        return Inertia::render('Home', [
            'products' => Product::paginate(20)->withQueryString(),
            'ziggy' => (new Ziggy())->toArray(),
            'breadcrumbs' => BreadcrumbService::home(),
        ]);
    }
}
