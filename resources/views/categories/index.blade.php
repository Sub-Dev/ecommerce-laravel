@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Título da página -->
        <h1 class="text-3xl font-semibold text-gray-800 dark:text-white mb-6">Categorias</h1>

        <!-- Mensagem de sucesso -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Botão de adicionar nova categoria -->
        <a href="{{ route('categories.create') }}" 
            class="mb-4 inline-block bg-blue-500 text-white font-semibold px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
            Adicionar Categoria
        </a>

        <!-- Tabela de categorias -->
        <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-300">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-4 font-medium text-gray-900 dark:text-white">ID</th>
                        <th class="px-6 py-4 font-medium text-gray-900 dark:text-white">Nome</th>
                        <th class="px-6 py-4 font-medium text-gray-900 dark:text-white">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="border-b border-gray-200 dark:border-gray-600">
                            <td class="px-6 py-4">{{ $category->id }}</td>
                            <td class="px-6 py-4">{{ $category->name }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <!-- Ver Categoria -->
                                <a href="{{ route('categories.show', $category->id) }}" 
                                    class="inline-block text-blue-500 hover:text-blue-700">
                                    Ver
                                </a>
                                <!-- Editar Categoria -->
                                <a href="{{ route('categories.edit', $category->id) }}" 
                                    class="inline-block text-yellow-500 hover:text-yellow-700">
                                    Editar
                                </a>
                                <!-- Excluir Categoria -->
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="inline-block text-red-500 hover:text-red-700">
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
