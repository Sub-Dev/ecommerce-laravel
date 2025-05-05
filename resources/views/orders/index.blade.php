<!-- resources/views/orders/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Pedidos</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('orders.create') }}" class="btn btn-primary">Adicionar Pedido</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Status</th>
                <th>Itens</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        @foreach ($order->items as $item)
                            <p>{{ $item->product->name }} - Quantidade: {{ $item->quantity }}</p>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
