@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-8 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-6">Detalhes da Categoria</h1>

        <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr class="text-left">
                    <th class="px-4 py-2 text-gray-700 dark:text-gray-200">ID</th>
                    <th class="px-4 py-2 text-gray-700 dark:text-gray-200">Nome</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t border-gray-300 dark:border-gray-600">
                    <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $category->id }}</td>
                    <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $category->name }}</td>
                </tr>
            </tbody>
        </table>

        <div class="mt-6">
            <a href="{{ route('categories.edit', $category->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-opacity-75">
                Editar Categoria
            </a>
        </div>
    </div>
@endsection
