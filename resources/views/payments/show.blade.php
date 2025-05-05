<!-- resources/views/payments/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detalhes do Pagamento</h1>

    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $payment->id }}</td>
        </tr>
        <tr>
            <th>Pedido</th>
            <td>{{ $payment->order->id }}</td>
        </tr>
        <tr>
            <th>Valor</th>
            <td>{{ $payment->amount }}</td>
        </tr>
        <tr>
            <th>Método</th>
            <td>{{ $payment->method }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $payment->status }}</td>
        </tr>
    </table>
@endsection
