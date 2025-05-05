<!-- resources/views/payments/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Pagamentos</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('payments.create') }}" class="btn btn-primary">Adicionar Pagamento</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pedido</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->order->id }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->status }}</td>
                    <td>
                        <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline;">
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
