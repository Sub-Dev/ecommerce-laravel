@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-8 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-6">Criar Pedido</h1>

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <!-- Status do Pedido -->
            <div class="mb-4">
                <label for="status" class="block text-gray-700 dark:text-gray-200 font-medium">Status</label>
                <input type="text" id="status" name="status" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 focus:outline-none">
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botão de Enviar -->
            <div class="mt-6">
                <button type="submit"
                    class="w-full py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                    Criar Pedido
                </button>
            </div>
        </form>
    </div>
@endsection
