@extends('layouts.public')

@section('content')
    <!-- Banner Principal -->
    <div class="relative bg-indigo-800 dark:bg-indigo-700">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80" alt="Banner">
            <div class="absolute inset-0 bg-indigo-800 dark:bg-indigo-700 mix-blend-multiply"></div>
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">Bem-vindo ao nosso E-commerce</h1>
            <p class="mt-6 text-xl text-indigo-100 dark:text-indigo-200 max-w-3xl">
                Encontre os melhores produtos com os melhores preços. Frete grátis para todo o Brasil.
            </p>
        </div>
    </div>

    <!-- Produtos em Destaque -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-2xl font-extrabold text-gray-900 dark:text-white mb-8">Produtos em Destaque</h2>
        <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            <!-- Produto 1 -->
            <div class="group">
                <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 dark:bg-gray-700 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80" class="w-full h-full object-center object-cover group-hover:opacity-75">
                </div>
                <h3 class="mt-4 text-sm text-gray-700 dark:text-gray-300">Produto 1</h3>
                <p class="mt-1 text-lg font-medium text-gray-900 dark:text-gray-100">R$ 99,99</p>
            </div>
            <!-- Produto 2 -->
            <div class="group">
                <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 dark:bg-gray-700 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80" class="w-full h-full object-center object-cover group-hover:opacity-75">
                </div>
                <h3 class="mt-4 text-sm text-gray-700 dark:text-gray-300">Produto 2</h3>
                <p class="mt-1 text-lg font-medium text-gray-900 dark:text-gray-100">R$ 149,99</p>
            </div>
            <!-- Produto 3 -->
            <div class="group">
                <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 dark:bg-gray-700 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80" class="w-full h-full object-center object-cover group-hover:opacity-75">
                </div>
                <h3 class="mt-4 text-sm text-gray-700 dark:text-gray-300">Produto 3</h3>
                <p class="mt-1 text-lg font-medium text-gray-900 dark:text-gray-100">R$ 199,99</p>
            </div>
            <!-- Produto 4 -->
            <div class="group">
                <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 dark:bg-gray-700 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80" class="w-full h-full object-center object-cover group-hover:opacity-75">
                </div>
                <h3 class="mt-4 text-sm text-gray-700 dark:text-gray-300">Produto 4</h3>
                <p class="mt-1 text-lg font-medium text-gray-900 dark:text-gray-100">R$ 249,99</p>
            </div>
        </div>
    </div>
@endsection
