<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Exception;

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
                'dia_fechamento' => Carbon::createFromFormat('d/m/Y', $request->dia_fechamento)->format('d-m-Y'),
                'dia_vencimento' => Carbon::createFromFormat('d/m/Y', $request->dia_vencimento)->format('d-m-Y'),
                'limite' => $request->limite,
            ]);
            return redirect()->route('conta.index');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function edit(Conta $conta) {
        return view('usuario.conta.dados', compact('conta'));
    }

    public function update(Conta $conta, Request $request) {
        try {
            $conta->update([
                'tipo' => $request->tipo_conta,
                'nome_conta' => $request->nome_conta,
                'saldo' => $request->saldo,
                'ativo' => 1,
                'dia_fechamento' => Carbon::createFromFormat('d/m/Y', $request->dia_fechamento)->format('d-m-Y'),
                'dia_vencimento' => Carbon::createFromFormat('d/m/Y', $request->dia_vencimento)->format('d-m-Y'),
                'limite' => $request->limite,
            ]);
            return redirect()->back();
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function delete(Request $request) {
        $this->conta->find($request->id)->delete();
        return redirect()->route('conta.index');
    }
}
