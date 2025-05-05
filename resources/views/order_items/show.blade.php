<!-- resources/views/order_items/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detalhes do Item de Pedido</h1>

    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $orderItem->id }}</td>
        </tr>
        <tr>
            <th>Pedido</th>
            <td>{{ $orderItem->order->id }}</td>
        </tr>
        <tr>
            <th>Produto</th>
            <td>{{ $orderItem->product->name }}</td>
        </tr>
        <tr>
            <th>Quantidade</th>
            <td>{{ $orderItem->quantity }}</td>
        </tr>
        <tr>
            <th>Preço</th>
            <td>{{ $orderItem->price }}</td>
        </tr>
    </table>
@endsection
