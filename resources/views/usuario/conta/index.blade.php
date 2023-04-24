@extends('usuario.template')

@section('titulo', 'CONTAS CADASTRADAS')

@section('conteudo')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Minhas Contas</h3>
            <a href="{{ Route('conta.create') }}" class="btn btn-success" role="button" title="Adicionar Conta">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="block-content">
            <table class="table table-vcenter">
                <thead>
                <tr class="bg-body-dark">
                    <th class="text-center" style="width: 50px;">-</th>
                    <th class="text-center" style="width: 100px;">Conta</th>
                    <th class="text-center" style="width: 100px;">Tipo</th>
                    <th class="text-center" style="width: 100px;">Saldo</th>
                    <th class="text-center" style="width: 100px;">Fechamento</th>
                    <th class="text-center" style="width: 100px;">Vencimento</th>
                    <th class="text-center" style="width: 100px;">Crédito Disponivel</th>
                    <th class="text-center" style="width: 100px;">Ações</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($contas as $k => $conta)
                        <tr>
                            <th class="text-center" scope="row">{{ $k+1 }}</th>
                            <td class="fw-semibold text-center">
                                <a href="#">{{$conta->nome_conta}}</a>
                            </td>
                            <th class="text-center">{{ $conta->tipo }}</th>
                            <th class="text-center">R$ {{ $conta->saldo }}</th>
                            <th class="text-center">Dia {{ date_format($conta->dia_fechamento, 'd') }}</th>
                            <th class="text-center">Dia {{ date_format($conta->dia_vencimento, 'd') }}</th>
                            <th class="text-center">R$ {{ $conta->limite }}</th>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ Route('conta.edit', $conta->id) }}" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" role="button" title="Editar">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <a href="#"
                                       class="btn btn-sm btn-alt-danger"
                                       data-bs-toggle="modal" data-bs-target="#modalDelete" data-id="{{$conta->id}}"
                                       data-item="{{ "Deseja remover <b>$conta->nome_conta</b> de suas contas?" }}"
                                       data-url="conta/delete"
                                       title="Excluir">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="8" class="text-center"> Ainda não há contas registradas </th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
