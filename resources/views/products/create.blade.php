@extends('layouts.app')

@section('content')
    <h1>Criar Novo Produto</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nome do Produto</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="category_id">Categoria</label>
            <select id="category_id" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="price">Preço</label>
            <input type="text" id="price" name="price" required>
        </div>

        <button type="submit">Criar Produto</button>
    </form>
@endsection
