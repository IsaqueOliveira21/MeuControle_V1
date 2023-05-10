@extends('usuario.template')

@section('titulo', 'MOVIMENTAÇÕES - CARTÃO')

@section('conteudo')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Parceladas</h3>
        </div>
        <div class="block-content">
            <div class="table-responsive">
            <table class="table table-striped table-vcenter">
                <thead>
                <tr>
                    <th class="text-center">Descrição</th>
                    <th class="text-center">Conta</th>
                    <th class="text-center">Autor</th>
                    <th class="text-center">Data</th>
                    <th class="text-center">Tipo</th>
                    @foreach($datas as $data)
                        <th class="text-center">{{ \Carbon\Carbon::parse($data)->format('m/Y') }}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($movimentacoes as $movimentacao)
                    <tr>
                        <td class="text-center"><a href="{{ Route('movimentacoes.detalhes', $movimentacao->id) }}" class="text-primary"><b>{{ $movimentacao->descricao }}</b></a></td>
                        <td class="text-center">{{ $movimentacao->nome_conta }}</td>
                        <td class="text-center text-{{ !is_null($movimentacao->amigo) ? 'primary' : 'secondary' }}"><b>{{ !is_null($movimentacao->amigo) ? $movimentacao->amigo : 'Você' }}</b></td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($movimentacao->vencimento)->format('d/m/Y') }}</td>
                        <td class="text-center">
                            <span class="badge bg-{{$movimentacao->tipo === 'ENTRADA' ? 'success' : 'danger'}}">{{ $movimentacao->tipo }}</span>
                        </td>
                        @foreach($valores as $valor)
                            <td class="text-center text-{{$movimentacao->tipo === 'ENTRADA' ? 'success' : 'danger'}}"><b>R$ {{ number_format($valor[$movimentacao->descricao], 2, ',') }}</b></td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection
