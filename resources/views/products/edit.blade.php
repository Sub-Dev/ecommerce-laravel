@extends('layouts.app')

@section('content')
    <h1>Editar Produto</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nome do Produto</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" required>
        </div>

        <div>
            <label for="category_id">Categoria</label>
            <select id="category_id" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="price">Preço</label>
            <input type="text" id="price" name="price" value="{{ $product->price }}" required>
        </div>

        <button type="submit">Salvar Alterações</button>
    </form>
@endsection
