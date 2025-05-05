<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        // Obtém todos os itens de pedido com o pedido e produto relacionados
        $orderItems = OrderItem::with(['order', 'product'])->get();

        // Retorna a view 'order_items.index' e passa os itens de pedido para ela
        return view('order_items.index', compact('orderItems'));
    }

    public function create()
    {
        // Retorna a view para criar um novo item de pedido
        return view('order_items.create');
    }

    public function store(Request $request)
    {
        // Cria um novo item de pedido com os dados do formulário
        $orderItem = OrderItem::create($request->all());

        // Redireciona para a página de itens de pedido com uma mensagem de sucesso
        return redirect()->route('order_items.index')->with('success', 'Item de pedido criado com sucesso!');
    }

    public function show($id)
    {
        // Obtém o item de pedido específico com o pedido e produto relacionados
        $orderItem = OrderItem::with(['order', 'product'])->find($id);

        // Retorna a view 'order_items.show' e passa o item de pedido para ela
        return view('order_items.show', compact('orderItem'));
    }

    public function edit($id)
    {
        // Obtém o item de pedido para edição
        $orderItem = OrderItem::find($id);

        // Retorna a view 'order_items.edit' e passa o item de pedido para ela
        return view('order_items.edit', compact('orderItem'));
    }

    public function update(Request $request, $id)
    {
        // Encontra o item de pedido existente e atualiza com os dados do formulário
        $orderItem = OrderItem::find($id);
        $orderItem->update($request->all());

        // Redireciona para a página de itens de pedido com uma mensagem de sucesso
        return redirect()->route('order_items.index')->with('success', 'Item de pedido atualizado com sucesso!');
    }

    public function destroy($id)
    {
        // Exclui o item de pedido
        OrderItem::destroy($id);

        // Redireciona para a página de itens de pedido com uma mensagem de sucesso
        return redirect()->route('order_items.index')->with('success', 'Item de pedido excluído com sucesso!');
    }
}
