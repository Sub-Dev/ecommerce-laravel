@extends('layouts.public')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Nossos Produtos</h1>

    <!-- Filtro por categoria -->
    <form method="GET" action="{{ route('products.public') }}" class="mb-6">
        <label for="category" class="block mb-2 font-medium">Filtrar por Categoria:</label>
        <select name="category" id="category"
                class="w-full md:w-1/3 p-2 border rounded dark:bg-gray-700 dark:text-white"
                onchange="this.form.submit()">
            <option value="">Todas as categorias</option>
            <option value="Electronics" {{ request('category') == 'Electronics' ? 'selected' : '' }}>Electronics</option>
            <option value="Clothing" {{ request('category') == 'Clothing' ? 'selected' : '' }}>Clothing</option>
            <option value="Home & Furniture" {{ request('category') == 'Home & Furniture' ? 'selected' : '' }}>Home & Furniture</option>
            <option value="Beauty & Health" {{ request('category') == 'Beauty & Health' ? 'selected' : '' }}>Beauty & Health</option>
            <option value="Sports" {{ request('category') == 'Sports' ? 'selected' : '' }}>Sports</option>
        </select>
    </form>

    <!-- Produtos -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse ($products as $product)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                     class="w-full h-48 object-cover rounded-md mb-4">

                <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                <p class="mt-2 text-sm">{{ $product->description }}</p>
                <p class="mt-2 font-bold text-indigo-600 dark:text-indigo-300">
                    R$ {{ number_format($product->price, 2, ',', '.') }}
                </p>

                <!-- Botão Comprar -->
                <button
                    type="button"
                    onclick="window.addToCart({{ $product->id }})"
                    class="mt-4 w-full bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700 transition-colors">
                    Comprar
                </button>
            </div>
        @empty
            <p>Sem produtos no momento.</p>
        @endforelse
    </div>

    <!-- Paginação -->
    <div class="mt-6">
        {{ $products->links() }}
    </div>
@endsection
