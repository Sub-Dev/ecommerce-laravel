@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-8 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-6">Detalhes do Pedido</h1>

        <!-- Detalhes do Pedido -->
        <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md">
            <table class="min-w-full bg-white dark:bg-gray-800 table-auto rounded-lg">
                <tbody>
                    <tr class="border-b border-gray-300 dark:border-gray-600">
                        <th class="px-4 py-2 text-gray-800 dark:text-gray-100">ID</th>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $order->id }}</td>
                    </tr>
                    <tr class="border-b border-gray-300 dark:border-gray-600">
                        <th class="px-4 py-2 text-gray-800 dark:text-gray-100">Data</th>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $order->created_at }}</td>
                    </tr>
                    <tr class="border-b border-gray-300 dark:border-gray-600">
                        <th class="px-4 py-2 text-gray-800 dark:text-gray-100">Status</th>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $order->status }}</td>
                    </tr>
                    <tr class="border-b border-gray-300 dark:border-gray-600">
                        <th class="px-4 py-2 text-gray-800 dark:text-gray-100">Itens</th>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-100">
                            @foreach ($order->items as $item)
                                <p class="text-sm text-gray-800 dark:text-gray-200">{{ $item->product->name }} - Quantidade: {{ $item->quantity }}</p>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Ações -->
        <div class="mt-6 flex space-x-4">
            <a href="{{ route('orders.index') }}"
                class="inline-block bg-blue-500 text-white py-2 px-6 rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                Voltar para os Pedidos
            </a>
        </div>
    </div>
@endsection
