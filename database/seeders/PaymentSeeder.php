<?php

namespace Database\Seeders;

use App\Models\Payment;
use App\Models\Order;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        $order = Order::first();  

        Payment::create([
            'order_id' => $order->id,
            'amount' => 1029.98,
            'method' => 'Credit Card',
            'status' => 'completed',
        ]);
    }
}

