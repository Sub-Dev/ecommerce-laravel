<!-- resources/views/categories/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Editar Categoria</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
