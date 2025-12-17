<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Inertia\Inertia;
use App\Models\Product;
use App\Services\Breadcrumb\BreadcrumbService;
use Inertia\Response;
use Tighten\Ziggy\Ziggy;

class CategoryController extends Controller
{
    /**
     * Category page display
     *
     * @return Response
     */
    public function show(Category $category): Response
    {
        if ($category->is_parent) {
            $childCategories = $category->children()->withCount('products')->get();
            $productsQuery = Product::whereIn('category_id', $childCategories->pluck('id'));
        } else {
            $childCategories = collect();
            $productsQuery = Product::where('category_id', $category->id);
        }

        return Inertia::render('Category', [
            'childCategories' => $childCategories,
            'totalProducts' => $productsQuery->count(),
            'products' => $productsQuery->paginate(20)->onEachSide(2)->withQueryString(),
            'selectedCategory' => $category,
            'breadcrumbs' => BreadcrumbService::category($category),
            'ziggy' => (new Ziggy())->toArray(),
        ]);
    }
}
