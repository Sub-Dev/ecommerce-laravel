<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Electronics']);
        Category::create(['name' => 'Clothing']);
        Category::create(['name' => 'Home & Furniture']);
        Category::create(['name' => 'Beauty & Health']);
        Category::create(['name' => 'Sports']);
    }
}

