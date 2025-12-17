<?php

namespace App\Services\Breadcrumb;

use App\Models\Category;

class BreadcrumbService
{
    /**
     * Homepage crumbs
     *
     * @return array
     */
    public static function home(): array
    {
        return [
            ['title' => 'Home', 'href' => route('home.show'), 'disabled' => false],
        ];
    }

    /**
     * Category crumbs
     *
     * @param Category $category
     * @return array
     */
    public static function category(Category $category): array
    {
        $breadcrumbs = self::home();

        foreach ($category->ancestors() as $ancestor) {
            $breadcrumbs[] = [
                'title' => $ancestor->name,
                'href'   => route('category.show', $ancestor->slug),
                'disabled' => false,
            ];
        }

        $breadcrumbs[] = [
            'title' => $category->name,
            'href'   => route('category.show', $category->slug),
            'disabled' => false,
        ];

        return $breadcrumbs;
    }
}
