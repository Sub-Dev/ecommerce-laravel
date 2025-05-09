@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-8 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">Editar Produto</h1>

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nome do Produto -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 dark:text-gray-300 font-medium">Nome do Produto</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none dark:bg-gray-900 dark:text-white">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Categoria -->
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 dark:text-gray-300 font-medium">Categoria</label>
                <select id="category_id" name="category_id"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none dark:bg-gray-900 dark:text-white">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Preço -->
            <div class="mb-4">
                <label for="price" class="block text-gray-700 dark:text-gray-300 font-medium">Preço</label>
                <input type="text" id="price" name="price" value="{{ $product->price }}" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none dark:bg-gray-900 dark:text-white">
                @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botão de Salvar Alterações -->
            <div class="mt-6">
                <button type="submit"
                    class="w-full py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 dark:bg-blue-600 dark:hover:bg-blue-700">
                    Salvar Alterações
                </button>
            </div>
        </form>
    </div>
@endsection
