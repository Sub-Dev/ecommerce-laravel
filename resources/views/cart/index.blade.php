@extends('layouts.public')

@section('content')
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Carrinho de Compras</h1>

        @if(count($cart) > 0)
            <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-white">Seus Produtos</h2>
                        <button onclick="clearCart()" class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300">
                            Limpar Carrinho
                        </button>
                    </div>
                </div>
                <div class="border-t border-gray-200 dark:border-gray-700">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($cart as $item)
                            <li class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="h-16 w-16 object-cover rounded">
                                        <div class="ml-4">
                                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">{{ $item['name'] }}</h3>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">R$ {{ number_format($item['price'], 2, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="flex items-center border rounded-md">
                                            <button onclick="updateQuantity({{ $item['id'] }}, {{ $item['quantity'] - 1 }})" class="px-3 py-1 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">-</button>
                                            <span class="px-3 py-1 text-gray-900 dark:text-white">{{ $item['quantity'] }}</span>
                                            <button onclick="updateQuantity({{ $item['id'] }}, {{ $item['quantity'] + 1 }})" class="px-3 py-1 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">+</button>
                                        </div>
                                        <button onclick="removeFromCart({{ $item['id'] }})" class="ml-4 text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="px-4 py-5 sm:px-6 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex justify-between items-center">
                        <div class="text-lg font-medium text-gray-900 dark:text-white">
                            Total: R$ {{ number_format($total, 2, ',', '.') }}
                        </div>
                        <button class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 transition-colors">
                            Finalizar Compra
                        </button>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Carrinho vazio</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Adicione alguns produtos ao seu carrinho para começar a comprar.</p>
                <div class="mt-6">
                    <a href="{{ route('products.public') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Ver Produtos
                    </a>
                </div>
            </div>
        @endif
    </div>

    <script>
        function updateQuantity(productId, quantity) {
            if (quantity < 1) return;
            
            fetch(`/cart/update/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ quantity })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                }
            });
        }

        function removeFromCart(productId) {
            fetch(`/cart/remove/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                }
            });
        }

        function clearCart() {
            if (!confirm('Tem certeza que deseja limpar o carrinho?')) return;

            fetch('/cart/clear', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                }
            });
        }
    </script>
@endsection 