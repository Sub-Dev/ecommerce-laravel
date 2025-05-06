<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Buscar categorias
        $electronics = Category::where('name', 'Electronics')->first();
        $clothing = Category::where('name', 'Clothing')->first();
        $homeFurniture = Category::where('name', 'Home & Furniture')->first();
        $beautyHealth = Category::where('name', 'Beauty & Health')->first();
        $sports = Category::where('name', 'Sports')->first();

        // Produtos para a categoria Electronics
        Product::create([
            'name' => 'Smartphone XYZ',
            'description' => 'A powerful smartphone with great features.',
            'price' => 999.99,
            'category_id' => $electronics->id,
            'image' => 'images/default-product.jpg'
        ]);

        Product::create([
            'name' => 'Laptop ABC',
            'description' => 'High performance laptop for work and gaming.',
            'price' => 1999.99,
            'category_id' => $electronics->id,
            'image' => 'images/default-product.jpg'
        ]);

        Product::create([
            'name' => 'Smartwatch Pro 4',
            'description' => 'Advanced smartwatch with health tracking features.',
            'price' => 299.99,
            'category_id' => $electronics->id,
            'image' => 'images/default-product.jpg'
        ]);

        // Produtos para a categoria Clothing
        Product::create([
            'name' => 'T-shirt Graphic Design',
            'description' => 'Comfortable and stylish graphic design t-shirt.',
            'price' => 29.99,
            'category_id' => $clothing->id,
            'image' => 'images/default-product.jpg'
        ]);

        Product::create([
            'name' => 'Jeans Slim Fit',
            'description' => 'Fashionable slim fit jeans for casual wear.',
            'price' => 49.99,
            'category_id' => $clothing->id,
            'image' => 'images/default-product.jpg'
        ]);

        Product::create([
            'name' => 'Jacket Winter Edition',
            'description' => 'Warm and stylish winter jacket for cold weather.',
            'price' => 89.99,
            'category_id' => $clothing->id,
            'image' => 'images/default-product.jpg'
        ]);

        // Produtos para a categoria Home & Furniture
        Product::create([
            'name' => 'Sofa Cozy Comfort',
            'description' => 'Comfortable sofa for your living room.',
            'price' => 599.99,
            'category_id' => $homeFurniture->id,
            'image' => 'images/default-product.jpg'
        ]);

        Product::create([
            'name' => 'Dining Table Set',
            'description' => 'Modern dining table set with 6 chairs.',
            'price' => 299.99,
            'category_id' => $homeFurniture->id,
            'image' => 'images/default-product.jpg'
        ]);

        Product::create([
            'name' => 'Bookshelf Modern Design',
            'description' => 'Stylish bookshelf to organize your books and decor.',
            'price' => 79.99,
            'category_id' => $homeFurniture->id,
            'image' => 'images/default-product.jpg'
        ]);

        // Produtos para a categoria Beauty & Health
        Product::create([
            'name' => 'Facial Cleanser Gel',
            'description' => 'Gentle facial cleanser for daily use.',
            'price' => 19.99,
            'category_id' => $beautyHealth->id,
            'image' => 'images/default-product.jpg'
        ]);

        Product::create([
            'name' => 'Hair Conditioner Herbal',
            'description' => 'Nourishing herbal conditioner for healthy hair.',
            'price' => 9.99,
            'category_id' => $beautyHealth->id,
            'image' => 'images/default-product.jpg'
        ]);

        Product::create([
            'name' => 'Vitamin C Serum',
            'description' => 'Brightening serum with Vitamin C for glowing skin.',
            'price' => 29.99,
            'category_id' => $beautyHealth->id,
            'image' => 'images/default-product.jpg'
        ]);

        // Produtos para a categoria Sports
        Product::create([
            'name' => 'Yoga Mat Premium',
            'description' => 'Durable and comfortable yoga mat for workouts.',
            'price' => 39.99,
            'category_id' => $sports->id,
            'image' => 'images/default-product.jpg'
        ]);

        Product::create([
            'name' => 'Dumbbells Set',
            'description' => 'Set of 3 dumbbells for strength training.',
            'price' => 49.99,
            'category_id' => $sports->id,
            'image' => 'images/default-product.jpg'
        ]);

        Product::create([
            'name' => 'Running Shoes Pro',
            'description' => 'Lightweight and comfortable running shoes.',
            'price' => 79.99,
            'category_id' => $sports->id,
            'image' => 'images/default-product.jpg'
        ]);
    }
}
