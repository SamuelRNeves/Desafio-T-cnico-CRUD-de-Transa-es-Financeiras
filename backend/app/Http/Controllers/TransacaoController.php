<?php

namespace App\Http\Controllers;

use App\Models\Transacao;
use Illuminate\Http\Request;

class TransacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Listar todas as transações
        $transacoes = Transacao::all();
        return response()->json($transacoes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'tipo' => 'required|in:receita,despesa',
            'valor' => 'required|numeric',
            'tipo_id' => 'required|exists:tipos_transacoes,id',
            'descricao' => 'nullable|string'
        ]);

        // Ajustar valor para negativo se for despesa
        $valor = $request->tipo === 'despesa' ? -abs($request->valor) : abs($request->valor);

        // Criar a transação
        $transacao = Transacao::create([
            'tipo_id' => $request->tipo_id,
            'tipo' => $request->tipo,
            'valor' => $valor,
            'descricao' => $request->descricao,
        ]);

        // Retornar a transação criada
        return response()->json($transacao, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transacao $transacao)
    {
        // Exibir uma transação específica
        return response()->json($transacao);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transacao $transacao)
    {
        // Validação dos dados recebidos
        $request->validate([
            'tipo' => 'required|in:receita,despesa',
            'valor' => 'required|numeric',
            'tipo_id' => 'required|exists:tipos_transacoes,id',
            'descricao' => 'nullable|string'
        ]);

        // Ajustar valor para negativo se for despesa
        $valor = $request->tipo === 'despesa' ? -abs($request->valor) : abs($request->valor);

        // Atualizar a transação
        $transacao->update([
            'tipo_id' => $request->tipo_id,
            'tipo' => $request->tipo,
            'valor' => $valor,
            'descricao' => $request->descricao,
        ]);

        // Retornar a transação atualizada
        return response()->json($transacao);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transacao $transacao)
    {
        // Excluir uma transação
        $transacao->delete();

        // Retornar resposta de sucesso
        return response()->json(['message' => 'Transação excluída com sucesso!']);
    }
}
