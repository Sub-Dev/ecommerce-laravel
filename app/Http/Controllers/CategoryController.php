<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Obtém todas as categorias
        $categories = Category::all();

        // Retorna a view 'categories.index' e passa as categorias para ela
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        // Retorna a view para criar uma nova categoria
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // Cria uma nova categoria com os dados do formulário
        $category = Category::create($request->all());

        // Redireciona para a página de categorias com uma mensagem de sucesso
        return redirect()->route('categories.index')->with('success', 'Categoria criada com sucesso!');
    }

    public function show($id)
    {
        // Obtém a categoria específica
        $category = Category::find($id);

        // Retorna a view 'categories.show' e passa a categoria para ela
        return view('categories.show', compact('category'));
    }

    public function edit($id)
    {
        // Obtém a categoria para edição
        $category = Category::find($id);

        // Retorna a view 'categories.edit' e passa a categoria para ela
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Encontra a categoria existente e atualiza com os dados do formulário
        $category = Category::find($id);
        $category->update($request->all());

        // Redireciona para a página de categorias com uma mensagem de sucesso
        return redirect()->route('categories.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy($id)
    {
        // Exclui a categoria
        Category::destroy($id);

        // Redireciona para a página de categorias com uma mensagem de sucesso
        return redirect()->route('categories.index')->with('success', 'Categoria excluída com sucesso!');
    }
}


