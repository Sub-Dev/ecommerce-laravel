<!-- resources/views/order_items/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Criar Item de Pedido</h1>

    <form action="{{ route('order_items.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="order_id">Pedido</label>
            <input type="number" class="form-control" id="order_id" name="order_id" required>
        </div>
        <div class="form-group">
            <label for="product_id">Produto</label>
            <input type="number" class="form-control" id="product_id" name="product_id" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantidade</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <div class="form-group">
            <label for="price">Preço</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
