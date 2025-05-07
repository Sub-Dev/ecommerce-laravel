<?php

namespace App\Helpers;

class Cart
{
    public static function count()
    {
        $cart = session()->get('cart', []);
        return count($cart);
    }

    public static function get()
    {
        return session()->get('cart', []);
    }

    public static function total()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return $total;
    }
} 