@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-8 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">{{ $product->name }}</h1>
        <p class="text-gray-700 dark:text-gray-300 mb-4"><strong>Categoria:</strong> {{ $product->category->name }}</p>
        <p class="text-gray-700 dark:text-gray-300 mb-6"><strong>Preço:</strong> {{ $product->price }}</p>

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
    </div>
@endsection
