<!-- resources/views/orders/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Criar Pedido</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
