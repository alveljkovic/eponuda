<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Parent category
        $parent = Category::firstOrCreate([
            'name' => 'TV sprejemniki',
            'slug' => 'tv-sprejemniki',
            'parent_id' => null,
        ]);

        // 2. Child categories
        Category::firstOrCreate([
            'name' => 'Televizorji',
            'slug' => 'televizorji',
            'parent_id' => $parent->id,
        ]);

        Category::firstOrCreate([
            'name' => 'TV dodatki',
            'slug' => 'tv-dodatki',
            'parent_id' => $parent->id,
        ]);
    }
}
