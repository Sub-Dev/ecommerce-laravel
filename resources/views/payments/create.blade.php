<!-- resources/views/payments/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Criar Pagamento</h1>

    <form action="{{ route('payments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="order_id">Pedido</label>
            <input type="number" class="form-control" id="order_id" name="order_id" required>
        </div>
        <div class="form-group">
            <label for="amount">Valor</label>
            <input type="number" class="form-control" id="amount" name="amount" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="method">Método</label>
            <input type="text" class="form-control" id="method" name="method" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
