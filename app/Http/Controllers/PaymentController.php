<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        // Obtém todos os pagamentos com os pedidos relacionados
        $payments = Payment::with('order')->get();

        // Retorna a view 'payments.index' e passa os pagamentos para ela
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        // Retorna a view para criar um novo pagamento
        return view('payments.create');
    }

    public function store(Request $request)
    {
        // Cria um novo pagamento com os dados do formulário
        $payment = Payment::create($request->all());

        // Redireciona para a página de pagamentos com uma mensagem de sucesso
        return redirect()->route('payments.index')->with('success', 'Pagamento criado com sucesso!');
    }

    public function show($id)
    {
        // Obtém o pagamento específico com o pedido relacionado
        $payment = Payment::with('order')->find($id);

        // Retorna a view 'payments.show' e passa o pagamento para ela
        return view('payments.show', compact('payment'));
    }

    public function edit($id)
    {
        // Obtém o pagamento para edição
        $payment = Payment::find($id);

        // Retorna a view 'payments.edit' e passa o pagamento para ela
        return view('payments.edit', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        // Encontra o pagamento existente e atualiza com os dados do formulário
        $payment = Payment::find($id);
        $payment->update($request->all());

        // Redireciona para a página de pagamentos com uma mensagem de sucesso
        return redirect()->route('payments.index')->with('success', 'Pagamento atualizado com sucesso!');
    }

    public function destroy($id)
    {
        // Exclui o pagamento
        Payment::destroy($id);

        // Redireciona para a página de pagamentos com uma mensagem de sucesso
        return redirect()->route('payments.index')->with('success', 'Pagamento excluído com sucesso!');
    }
}

