<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class ApiCategoryController extends Controller
{
    /**
     * Parent categories endpoint
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $categories = Category::whereNull('parent_id')->get();
        return response()->json($categories);
    }
}
