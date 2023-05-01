@extends('usuario.template')

@section('titulo', 'DASHBOARD')

@section('conteudo')

    <div class="content content-full">
        <!-- Overview -->
        <div class="d-flex justify-content-between align-items-center py-3">
            <h2 class="h3 fw-normal mb-0">Resumo</h2>
        </div>
        <div class="row items-push">
            <div class="col-sm-6 col-xl-3">
                <a class="block block-rounded block-fx-pop text-center h-100 mb-0" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="item item-circle bg-primary-lighter mx-auto my-3">
                            <i class="fa fa-money-bill-wave-alt text-primary"></i>
                        </div>
                        <div class="display-7 fw-bold text-success">R$ {{ $saldoGeral }}</div>
                        <div class="text-muted mt-1">Saldo Geral</div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-xl-3">
                <a class="block block-rounded block-fx-pop text-center h-100 mb-0" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="item item-circle bg-xinspire-lighter mx-auto my-3">
                            <i class="fa fa-calendar text-xinspire-dark"></i>
                        </div>
                        <div class="display-7 fw-bold text-danger">R$ {{ $gastoRecorrenteMes }}</div>
                        <div class="text-muted mt-1">Gastos Recorrentes/mês</div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-xl-3">
                <a class="block block-rounded block-fx-pop text-center h-100 mb-0" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="item item-circle bg-xsmooth-lighter mx-auto my-3">
                            <i class="fa fa-calculator text-xsmooth"></i>
                        </div>
                        <div class="display-7 fw-bold text-danger">R$ {{ $gastoAteAgora }}</div>
                        <div class="text-muted mt-1">Valor Total Gasto (<b>{{\Carbon\Carbon::now()->year}}</b>)</div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-xl-3">
                <a class="block block-rounded block-fx-pop text-center h-100 mb-0" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="item item-circle bg-xplay-lighter mx-auto my-3">
                            <i class="fa fa-credit-card text-xplay"></i>
                        </div>
                        <div class="display-7 fw-bold text-danger">R$ {{ $gastoCartao }}</div>
                        <div class="text-muted mt-1">Gastos com Cartão</div>
                    </div>
                </a>
            </div>
        </div>

    <div class="content">
        <div class="block block-rounded mb-5">
            <div class="block-content">
                <div id="graficoGastosGanhos">
                </div>
            </div>
        </div>
        <div class="block block-rounded mb-5">
            <div class="block-content">
                <div id="graficoGastosGanhosColuna">
                </div>
            </div>
        </div>
    </div>
@endsection
