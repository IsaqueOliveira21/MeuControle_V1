<?php

namespace App\Http\Controllers;

use App\Models\Movimentacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
