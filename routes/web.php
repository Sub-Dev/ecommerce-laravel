<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard protegido (apenas logado e verificado)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas protegidas por autenticação
Route::middleware('auth')->group(function () {
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

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
});

// Rotas de autenticação do Breeze (login, register, forgot password etc)
require __DIR__.'/auth.php';
