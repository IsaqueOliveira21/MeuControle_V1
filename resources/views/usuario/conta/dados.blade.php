@extends('usuario.template')

@section('titulo', 'NOVA CONTA')

@section('conteudo')
    <div class="block block-rounded">
        <div class="block-content block-header-default">
            <form action="{{isset($conta) ? Route('conta.update', $conta->id) : Route('conta.store') }}" method="POST" enctype="application/x-www-form-urlencoded">
                @csrf
                @if(isset($conta))
                    @method('PUT')
                @endif
                <div class="row mb-4">
                    <div class="col-6">
                        <label for="nome_conta" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome_conta" id="nome_conta" value="{{ $conta->nome_conta ?? '' }}" placeholder="Nome da Conta">
                    </div>
                    <div class="col-6">
                        <label for="tipo_conta" class="form-label">Tipo</label>
                        <select class="form-select" name="tipo_conta" id="tipo_conta">
                            <option value="">TIPO DA CONTA</option>
                            <option value="POUPANÇA" {{ isset($conta->tipo) && $conta->tipo === 'POUPANÇA' ? 'selected' : '' }}>Poupança</option>
                            <option value="CORRENTE" {{ isset($conta->tipo) && $conta->tipo === 'CORRENTE' ? 'selected' : '' }}>Corrente</option>
                            <option value="INVESTIMENTO" {{ isset($conta->tipo) && $conta->tipo === 'INVESTIMENTO' ? 'selected' : '' }}>Investimento</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <label for="dia_fechamento" class="form-label">Fechamento de Cobrança</label>
                        <input type="text" class="js-datepicker form-control" id="data"
                               name="dia_fechamento" data-week-start="1" data-autoclose="true"
                               data-today-highlight="true" data-date-format="dd/mm/yyyy"
                               placeholder="dd/mm/aaaa" autocomplete="off" value="{{ date_format($conta->dia_fechamento, 'd/m/Y') ?? '' }}">
                    </div>
                    <div class="col-6">
                        <label for="dia_vencimento" class="form-label">Vencimento de Cobrança</label>
                        <input type="text" class="js-datepicker form-control" id="data"
                               name="dia_vencimento" data-week-start="1" data-autoclose="true"
                               data-today-highlight="true" data-date-format="dd/mm/yyyy"
                               placeholder="dd/mm/aaaa" autocomplete="off" value="{{ date_format($conta->dia_vencimento, 'd/m/Y') ?? '' }}">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <label for="saldo" class="form-label">Saldo Atual</label>
                        <input type="number" name="saldo" id="saldo" min="0" class="form-control" placeholder="R$ 1000,00" value="{{ $conta->saldo ?? '' }}">
                    </div>
                    <div class="col-6">
                        <label for="limite" class="form-label">Limite de Crédito Disponível</label>
                        <input type="number" name="limite" id="limite" min="0" class="form-control" placeholder="R$ 1000,00" value="{{ $conta->limite ?? '' }}">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <button type="submit" class="btn btn-outline-success">Salvar</button>
                        <a href="{{ Route('conta.index') }}" class="btn btn-outline-secondary" role="button">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
