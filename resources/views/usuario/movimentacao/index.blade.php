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
                            <button type="button" class="btn btn-warning push" data-bs-toggle="modal" data-bs-target="#modal-detalhes">
                                <i class="fa fa-clipboard-list"></i>
                            </button>
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
    <div class="modal fade" id="modal-detalhes" tabindex="-1" role="dialog" aria-labelledby="modal-detalhes" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Modal Title</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Done</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Detalhes -->
@endsection
