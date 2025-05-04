<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\PaymentController;

// Rotas para categorias
Route::resource('categories', CategoryController::class);

// Rotas para produtos
Route::resource('products', ProductController::class);

// Rotas para pedidos
Route::resource('orders', OrderController::class);

// Rotas para itens do pedido
Route::resource('order-items', OrderItemController::class);

// Rotas para pagamentos
Route::resource('payments', PaymentController::class);
