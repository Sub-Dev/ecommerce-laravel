@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto mt-8 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-6">Categorias</h1>

        <!-- Mensagem de Sucesso -->
        @if(session('success'))
            <div class="alert alert-success mb-4 p-4 bg-green-100 dark:bg-green-700 text-green-800 dark:text-green-200 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Botão Adicionar Categoria -->
        <a href="{{ route('categories.create') }}" 
            class="mb-4 inline-block bg-blue-500 text-white py-2 px-6 rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
            Adicionar Categoria
        </a>

        <!-- Tabela de Categorias -->
        <div class="overflow-x-auto shadow-md rounded-lg">
            <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-800 dark:text-gray-100">ID</th>
                        <th class="px-4 py-2 text-left text-gray-800 dark:text-gray-100">Nome</th>
                        <th class="px-4 py-2 text-left text-gray-800 dark:text-gray-100">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="border-t border-gray-300 dark:border-gray-600">
                            <td class="px-4 py-2 text-gray-800 dark:text-gray-200">{{ $category->id }}</td>
                            <td class="px-4 py-2 text-gray-800 dark:text-gray-200">{{ $category->name }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('categories.show', $category->id) }}" 
                                    class="inline-block bg-blue-500 text-white py-2 px-4 rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                                    Ver
                                </a>
                                <a href="{{ route('categories.edit', $category->id) }}" 
                                    class="inline-block ml-2 bg-yellow-500 text-white py-2 px-4 rounded-md shadow-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-opacity-75">
                                    Editar
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="inline-block ml-2 bg-red-500 text-white py-2 px-4 rounded-md shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        <div class="mt-6">
            {{ $categories->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
