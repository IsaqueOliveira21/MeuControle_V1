<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use App\Models\Movimentacao;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(): Factory|View|Application
    {
        $saldoGeral = Conta::where('user_id', Auth::user()->id)
            ->sum('saldo');
        $gastoRecorrenteMes = Movimentacao::where('user_id', Auth::user()->id)
            ->where('tipo', 'SAIDA')
            ->where('recorrencia', 'MENSAL')
            ->sum('valor_total');
        /*
        SELECT * FROM movimentacoes_financeiras
        WHERE user_id = 1
        AND YEAR(data) LIKE YEAR(NOW());
         */
        $gastoAteAgora = Movimentacao::where('user_id', Auth::user()->id)
            ->whereRaw("YEAR(data) LIKE YEAR(NOW())")
            ->where('tipo', 'SAIDA')
            ->sum('valor_total');
        $gastoCartao = Movimentacao::where('user_id', Auth::user()->id)
            ->where('tipo', 'SAIDA')
            ->where('forma_pagamento', 'CREDITO')
            ->sum('valor_total');
        $graficos = [];

        $query = DB::table('movimentacoes_financeiras')
            ->selectRaw('CONCAT(MONTH(data), "/", YEAR(data)) AS mes_ano, tipo, SUM(valor_total) AS total')
            ->where('user_id', Auth::user()->id)
            ->groupBy( 'mes_ano', 'tipo')
            ->orderBy('data', 'DESC')
            ->limit(12)
            ->get();

        foreach ($query as $linha) {
            $graficos['grafico1'][$linha->mes_ano] = ['ENTRADA' => 0, 'SAIDA' => 0];
        }

        foreach ($query as $linha) {
            $graficos['grafico1'][$linha->mes_ano][$linha->tipo] = $linha->total;
        }
        $graficos['grafico1'] = array_reverse($graficos['grafico1']);

        foreach ($query as $linha) {
            $graficos['grafico2'][$linha->mes_ano] = ['ENTRADA' => 0,'SAIDA' => 0];
        }

        foreach ($query as $linha) {
            $graficos['grafico2'][$linha->mes_ano][$linha->tipo] = $linha->total;
        }

        $graficos['grafico2'] = array_reverse($graficos['grafico2']);
        return view('usuario.dashboard.index', compact(['graficos', 'saldoGeral', 'gastoRecorrenteMes', 'gastoAteAgora', 'gastoCartao']));
    }
}
