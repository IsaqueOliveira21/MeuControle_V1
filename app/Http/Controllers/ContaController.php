<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContaController extends Controller
{
    private $conta;

    public function __construct(Conta $conta)
    {
        $this->conta = $conta;
    }

    public function index()
    {
        $contas = $this->conta->where('user_id', Auth::user()->id)->orderBy('nome_conta')->get();
        return view('usuario.conta.index', compact('contas'));
    }

    public function create() {
        return view('usuario.conta.dados');
    }

    public function store(Request $request) {
        try {
            $this->conta->create([
                'user_id' => Auth::user()->id,
                'tipo' => $request->tipo_conta,
                'nome_conta' => $request->nome_conta,
                'saldo' => $request->saldo,
                'ativo' => 1,
                'dia_fechamento' => $request->dia_fechamento,
                'dia_vencimento' => $request->dia_vencimento,
                'limite' => $request->limite,
            ]);
            return redirect()->route('conta.index');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
