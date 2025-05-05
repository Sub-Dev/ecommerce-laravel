<!-- resources/views/categories/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detalhes da Categoria</h1>

    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $category->id }}</td>
        </tr>
        <tr>
            <th>Nome</th>
            <td>{{ $category->name }}</td>
        </tr>
    </table>
@endsection
