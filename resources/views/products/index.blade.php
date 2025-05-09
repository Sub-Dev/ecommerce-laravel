@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-8 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">Produtos</h1>
        <a href="{{ route('products.create') }}" class="text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500">Adicionar Novo Produto</a>

        <ul class="mt-4">
            @foreach ($products as $product)
                <li class="flex justify-between items-center mb-4 p-4 border-b border-gray-300 dark:border-gray-700">
                    <div>
                        <a href="{{ route('products.show', $product->id) }}" class="text-lg text-gray-800 hover:text-blue-600 dark:text-white dark:hover:text-blue-500">
                            {{ $product->name }}
                        </a>
                        <p class="text-gray-500 dark:text-gray-300">{{ $product->category->name }}</p>
                    </div>

                    <div class="flex space-x-2">
                        <a href="{{ route('products.edit', $product->id) }}"
                            class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 dark:bg-yellow-600 dark:hover:bg-yellow-700">
                            Editar
                        </a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 dark:bg-red-600 dark:hover:bg-red-700">
                                Excluir
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
