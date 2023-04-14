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
                        <td class="text-center pt-4">
                            <a href="#"
                               class="btn btn-sm btn-alt-warning"
                               data-bs-toggle="modal" data-bs-target="#modalDetalhes" data-id="{{$movimentacao->id}}"
                               data-item="{{\Carbon\Carbon::parse($movimentacao->created_at)->format('d/m/Y')}}"
                               data-url="detalhe"
                               title="Detalhes">
                                <i class="fa fa-pencil-alt"></i>
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
    <!-- Modal Detalhes -->
    <div class="modal fade" id="modalDetalhes" tabindex="-1" role="dialog" aria-labelledby="modal-detalhes" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Detalhes</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <p id="detalheMovimentacao"></p>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Fechar</button>
                        <a href="#" id="btnModalEditar" class="btn btn-primary" role="button">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#modalDetalhe').on('show.bs.modal', function (event) {
            let params = $(event.relatedTarget)
            let id = params.data('id')
            let item = params.data('item')
            let url = params.data('url')
            let modal = $(this)
            modal.find('#detalheMovimentacao').html(item);
            modal.find('#btnModalEditar').attr('href', url + '?id=' + id);
        })
    </script>
    <!-- End Modal Detalhes -->
@endsection
