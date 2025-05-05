<!-- resources/views/order_items/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Editar Item de Pedido</h1>

    <form action="{{ route('order_items.update', $orderItem->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="order_id">Pedido</label>
            <input type="number" class="form-control" id="order_id" name="order_id" value="{{ $orderItem->order_id }}" required>
        </div>
        <div class="form-group">
            <label for="product_id">Produto</label>
            <input type="number" class="form-control" id="product_id" name="product_id" value="{{ $orderItem->product_id }}" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantidade</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $orderItem->quantity }}" required>
        </div>
        <div class="form-group">
            <label for="price">Preço</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $orderItem->price }}" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
