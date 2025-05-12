<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Obtém os pedidos com os itens relacionados e aplica a paginação
        $orders = Order::with('items')->paginate(10); // 10 pedidos por página

        // Retorna a view 'orders.index' e passa os pedidos e a paginação para ela
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        // Retorna a view para criar um novo pedido
        return view('orders.create');
    }

    public function store(Request $request)
    {
        // Cria um novo pedido com os dados do formulário
        $order = Order::create($request->all());

        // Redireciona para a página de pedidos com uma mensagem de sucesso
        return redirect()->route('orders.index')->with('success', 'Pedido criado com sucesso!');
    }

    public function show($id)
    {
        // Obtém um pedido específico com os itens relacionados
        $order = Order::with('items')->find($id);

        // Retorna a view 'orders.show' e passa o pedido para ela
        return view('orders.show', compact('order'));
    }

    public function edit($id)
    {
        // Obtém o pedido para edição
        $order = Order::find($id);

        // Retorna a view 'orders.edit' e passa o pedido para ela
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        // Encontra o pedido existente e atualiza com os dados do formulário
        $order = Order::find($id);
        $order->update($request->all());

        // Redireciona para a página de pedidos com uma mensagem de sucesso
        return redirect()->route('orders.index')->with('success', 'Pedido atualizado com sucesso!');
    }

    public function destroy($id)
    {
        // Exclui o pedido
        Order::destroy($id);

        // Redireciona para a página de pedidos com uma mensagem de sucesso
        return redirect()->route('orders.index')->with('success', 'Pedido excluído com sucesso!');
    }
}
