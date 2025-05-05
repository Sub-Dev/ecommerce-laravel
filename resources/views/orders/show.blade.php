<!-- resources/views/orders/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detalhes do Pedido</h1>

    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $order->id }}</td>
        </tr>
        <tr>
            <th>Data</th>
            <td>{{ $order->created_at }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $order->status }}</td>
        </tr>
        <tr>
            <th>Itens</th>
            <td>
                @foreach ($order->items as $item)
                    <p>{{ $item->product->name }} - Quantidade: {{ $item->quantity }}</p>
                @endforeach
            </td>
        </tr>
    </table>
@endsection
