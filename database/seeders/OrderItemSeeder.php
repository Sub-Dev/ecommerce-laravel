<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    public function run()
    {
        $order = Order::first();  // Pega o primeiro pedido

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => Product::where('name', 'Smartphone XYZ')->first()->id,
            'quantity' => 1,
            'price' => 999.99,
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => Product::where('name', 'T-shirt Graphic Design')->first()->id,
            'quantity' => 1,
            'price' => 29.99,
        ]);
    }
}
