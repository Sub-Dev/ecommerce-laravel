<!-- resources/views/orders/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Editar Pedido</h1>

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ $order->status }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
