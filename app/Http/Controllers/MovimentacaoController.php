<?php

namespace App\Http\Controllers;

use App\Models\Amigo;
use App\Models\Conta;
use App\Models\Movimentacao;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class MovimentacaoController extends Controller
{
    private $movimentacao;

    public function __construct(Movimentacao $movimentacao)
    {
        $this->movimentacao = $movimentacao;
    }

    public function index() {
        $movimentacoes = $this->movimentacao->where('user_id', Auth::user()->id)->orderBy('data', 'DESC')->paginate(10);
        return view('usuario.movimentacao.index', compact('movimentacoes'));
    }

    public function pagamentosRecorrentes() {
        $movimentacoes = $this->movimentacao->where('user_id', Auth::user()->id)
            ->where('recorrencia', '<>', 'NAO RECORRENTE')
            ->get();
        return view('usuario.movimentacao.recorrentes', compact('movimentacoes'));
    }

    public function parceladas()
    {
        $movimentacoes = DB::table('movimentacoes_financeiras')
            ->join('contas', 'movimentacoes_financeiras.conta_id', '=', 'contas.id')
            ->leftJoin('amigos', 'movimentacoes_financeiras.amigo_id', '=', 'amigos.id')
            ->selectRaw('movimentacoes_financeiras.id, descricao, contas.nome_conta, amigos.nome as amigo, movimentacoes_financeiras.tipo, data AS vencimento, valor_total, parcelado, IF(parcelado LIKE 0,  valor_total, valor_total/parcelado) AS valor_parcela')
            ->where('movimentacoes_financeiras.user_id', Auth::user()->id)
            //->where('forma_pagamento', 'CREDITO')
            //->orWhere('forma_pagamento', 'DEBITO')
            ->whereNotNull('parcelado')
            ->groupBy('vencimento', 'amigos.nome', 'movimentacoes_financeiras.id', 'descricao', 'tipo', 'contas.nome_conta', 'valor_total', 'parcelado')
            ->orderBy('vencimento')
            ->get();

        $datas = [];
        foreach ($movimentacoes as $linha) {
            if($linha->parcelado == 0) {
                for($i = 0; $i < 1; $i++) {
                    $mesAno = Carbon::parse($linha->vencimento)->addMonth($i)->format('Y-m');
                    if(!in_array($mesAno, $datas)) {
                        $datas[] = $mesAno;
                    }
                }
            } else {
                for($i = 0; $i < $linha->parcelado; $i++) {
                    $mesAno = Carbon::parse($linha->vencimento)->addMonth($i)->format('Y-m');
                    if(!in_array($mesAno, $datas)) {
                        $datas[] = $mesAno;
                    }
                }
            }
        }
        $valores = [];
        foreach($movimentacoes as $linha) {
            foreach($datas as $data) {
                $valores[$data][$linha->descricao] = 0;
            }
        }
        foreach($movimentacoes as $linha) {
            if($linha->parcelado == 0) {
                for($i = 0; $i < 1; $i++) {
                    $mesAno = Carbon::parse($linha->vencimento)->addMonth($i)->format('Y-m');
                    foreach($datas as $data){
                        if($data == $mesAno){
                            $valores[$data][$linha->descricao] = $linha->valor_parcela;
                        }
                    }
                }
            } else {
                for($i = 0; $i < $linha->parcelado; $i++) {
                    $mesAno = Carbon::parse($linha->vencimento)->addMonth($i)->format('Y-m');
                    foreach($datas as $data){
                        if($data == $mesAno){
                            $valores[$data][$linha->descricao] = $linha->valor_parcela;
                        }
                    }
                }
            }
        }
        return view('usuario.movimentacao.parceladas.index', compact(['datas', 'valores','movimentacoes']));
    }

    public function parceladasDetalhe(Movimentacao $movimentacao) {

    }

    public function create() {
        $contas = Conta::where('user_id', Auth::user()->id)->get();
        $amigos = Amigo::where('user_id', Auth::user()->id)->get();
        return view('usuario.movimentacao.dados', compact('contas', 'amigos'));
    }

    public function store(Request $request) {
        if($request->amigo === '1'){
            $amigoId = $request->listaAmigos;
        } else {
            $amigoId = null;
        }
        try {
            $this->movimentacao->create([
                'user_id' => Auth::user()->id,
                'conta_id' => $request->conta_id,
                'amigo_id' => $amigoId,
                'data' => $request->data,
                'tipo' => $request->tipo_movimentacao,
                'forma_pagamento' => $request->forma_pagamento,
                'descricao' => $request->descricao,
                'parcelado' => (is_null($request->parcelado) ? 0 : $request->parcelado),
                'valor_total' => $request->valor_total,
                'recorrencia' => $request->recorrencia,
                'observacao' => $request->observacoes,
            ]);
            $conta = Conta::find($request->conta_id);
            if($request->tipo == 'SAIDA') {
                $conta->update([
                    'saldo' => ($conta->saldo - $request->valor_total),
                ]);
            } else {
                $conta->update([
                    'saldo' => ($conta->saldo + $request->valor_total),
                ]);
            }
            return redirect()->route('movimentacoes.index');
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getLine());
        }
    }

    public function edit(Movimentacao $movimentacao) {
        $contas = Conta::where('user_id', Auth::user()->id)->get();
        $amigos = Amigo::where('user_id', Auth::user()->id)->get();
        return view('usuario.movimentacao.dados', compact('movimentacao', 'contas','amigos'));
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
        $amigos = Amigo::where('user_id', Auth::user()->id)->get();
        return view('usuario.movimentacao.dados', compact(['movimentacao','contas','amigos']));
    }
}
