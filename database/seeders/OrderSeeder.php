<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    public function run()
    {
        Order::create([
            'user_id' => 1,
            'status' => 'pending',
            'total_price' => 1029.98, // Corrigido aqui
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
