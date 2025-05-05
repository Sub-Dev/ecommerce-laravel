<!-- resources/views/order_items/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Itens de Pedido</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('order_items.create') }}" class="btn btn-primary">Adicionar Item de Pedido</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pedido</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderItems as $orderItem)
                <tr>
                    <td>{{ $orderItem->id }}</td>
                    <td>{{ $orderItem->order->id }}</td>
                    <td>{{ $orderItem->product->name }}</td>
                    <td>{{ $orderItem->quantity }}</td>
                    <td>{{ $orderItem->price }}</td>
                    <td>
                        <a href="{{ route('order_items.show', $orderItem->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('order_items.edit', $orderItem->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('order_items.destroy', $orderItem->id) }}" method="POST" style="display:inline;">
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
