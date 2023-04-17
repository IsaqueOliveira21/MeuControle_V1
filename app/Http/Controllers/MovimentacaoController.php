<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use App\Models\Movimentacao;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Exception;

class MovimentacaoController extends Controller
{
    private $movimentacao;

    public function __construct(Movimentacao $movimentacao)
    {
        $this->movimentacao = $movimentacao;
    }

    public function index() {
        $movimentacoes = $this->movimentacao->where('user_id', Auth::user()->id)->get();
        return view('usuario.movimentacao.index', compact('movimentacoes'));
    }

    public function create() {
        $contas = Conta::where('user_id', Auth::user()->id)->get();
        return view('usuario.movimentacao.dados', compact('contas'));
    }

    public function store(Request $request) {
        try {
            $this->movimentacao->create([
                'user_id' => Auth::user()->id,
                'conta_id' => $request->conta_id,
                'data' => $request->data,
                'tipo' => $request->tipo_movimentacao,
                'forma_pagamento' => $request->forma_pagamento,
                'descricao' => $request->descricao,
                'parcelado' => (is_null($request->parcelado) ? 0 : $request->parcelado),
                'valor_total' => $request->valor_total,
                'recorrencia' => $request->recorrencia,
                'observacao' => $request->observacoes,
            ]);
            return redirect()->route('movimentacoes.index');
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getLine());
        }
    }

    public function edit(Movimentacao $movimentacao) {
        $contas = Conta::where('user_id', Auth::user()->id)->get();
        return view('usuario.movimentacao.dados', compact('movimentacao', 'contas'));
    }

    public function update(Movimentacao $movimentacao, Request $request) {
        try {
            $movimentacao->update([
                'conta_id' => $request->conta_id,
                'data' => $request->data,
                'tipo' => $request->tipo_movimentacao,
                'forma_pagamento' => $request->forma_pagamento,
                'descricao' => $request->descricao,
                'parcelado' => (is_null($request->parcelado) ? 0 : $request->parcelado),
                'valor_total' => $request->valor_total,
                'recorrencia' => $request->recorrencia,
                'observacao' => $request->observacoes,
            ]);
            return redirect()->back();
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function detalhes(Movimentacao $movimentacao) {
        $contas = Conta::where('user_id', Auth::user()->id)->get();
        return view('usuario.movimentacao.dados', compact('movimentacao', 'contas'));
    }
}
