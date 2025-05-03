<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('adminpassword'),
            'role' => 'admin',  
        ]);

        User::create([
            'name' => 'Customer User',
            'email' => 'customer@example.com',
            'password' => Hash::make('customerpassword'),
            'role' => 'customer',  
        ]);

        User::create([
            'name' => 'Another Customer',
            'email' => 'another@example.com',
            'password' => Hash::make('anotherpassword'),
            'role' => 'customer',
        ]);
    }
}

