@extends('layouts.app')

@section('content')
    <h1>{{ $product->name }}</h1>
    <p><strong>Categoria:</strong> {{ $product->category->name }}</p>
    <p><strong>Preço:</strong> {{ $product->price }}</p>

    <a href="{{ route('products.edit', $product->id) }}">Editar</a>

    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Excluir</button>
    </form>
@endsection
