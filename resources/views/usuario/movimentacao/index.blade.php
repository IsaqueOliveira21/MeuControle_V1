@extends('usuario.template')

@section('titulo', 'CONTAS CADASTRADAS')

@section('conteudo')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Movimentações Financeiras</h3>
            <a href="#" class="btn btn-success" role="button" title="Adicionar Movimentação">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="block-content">
            <table class="table table-vcenter">
                <thead>
                <tr class="bg-body-dark">
                    <th class="text-center">-</th>
                    <th class="text-center">Conta</th>
                    <th class="text-center">Data</th>
                    <th class="text-center">Tipo</th>
                    <th class="text-center">Pagamento</th>
                    <th class="text-center">Valor</th>
                    <th class="text-center">Detalhes</th>
                </tr>
                </thead>
                <tbody>
                @forelse($movimentacoes as $k => $movimentacao)
                    <tr>
                        <th class="text-center" scope="row">{{ $k+1 }}</th>
                        <th class="text-center">{{ $movimentacao->conta->nome_conta }}</th>
                        <th class="text-center">{{ $movimentacao->data }}</th>
                        <th class="d-none d-sm-table-cell text-center">
                            <span class="badge bg-{{ $movimentacao->tipo === 'ENTRADA' ? 'success' : 'danger' }}">{{ $movimentacao->tipo }}</span>
                        </th>
                        <th class="text-center">{{ $movimentacao->forma_pagamento }}</th>
                        <th class="text-center">R$ {{ $movimentacao->valor_total }}</th>
                        <td class="text-center">
                            <a href="#" class="btn btn-warning" role="button">
                                <i class="fa fa-clipboard-list"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="8" class="text-center"> Ainda não há movimentações registradas </th>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
