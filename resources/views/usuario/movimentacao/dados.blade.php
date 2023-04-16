@extends('usuario.template')

@section('titulo', 'DETALHES DA MOVIMENTAÇÃO')

@section('conteudo')
    <div class="block block-rounded">
        <div class="block-content block-header-default">
            <form action="{{ Route('movimentacoes.store') }}" method="POST" enctype="application/x-www-form-urlencoded">
                @csrf
                <div class="row mb-4">
                    <div class="col-6">
                        <label for="conta_id" class="form-label">Conta</label>
                        <select class="form-select" name="conta_id" id="conta_id">
                            <option value="">SELECIONAR CONTA</option>
                            @foreach($contas as $conta)
                                <option value="{{ $conta->id }}">{{ $conta->nome_conta }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="data" class="form-label">Data</label>
                        <input type="date" class="form-control" name="data" id="data">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <label for="tipo_movimentacao" class="form-label">Tipo de Movimentação</label>
                        <select class="form-select" name="tipo_movimentacao" id="tipo_movimentacao">
                            <option value="ENTRADA">Entrada</option>
                            <option value="SAIDA">Saída</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="forma_pagamento" class="form-label">Forma de Pagamento</label>
                        <select class="form-select" name="forma_pagamento" id="forma_pagamento">
                            <option value="A VISTA">A Vista</option>
                            <option value="DEBITO">Débito</option>
                            <option value="CREDITO">Crédito</option>
                            <option value="PIX">PIX</option>
                            <option value="TRANSFERENCIA">Transferência</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <label for="descricao" class="form-label">Descrição</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição">
                    </div>
                    <div class="col-6">
                        <label for="parcelado" class="form-label">Parcelado</label>
                        <input type="number" class="form-control" name="parcelado" id="parcelado" min="0" step="1" placeholder="12x">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <label for="valor_total" class="form-label">Valor Total</label>
                        <input type="number" class="form-control" name="valor_total" id="valor_total" placeholder="R$ 100,00">
                    </div>
                    <div class="col-6">
                        <label for="recorrencia" class="form-label">Recorrencia</label>
                        <select class="form-select" name="recorrencia" id="recorrencia">
                            <option value="NAO RECORRENTE">Não Recorrente</option>
                            <option value="DIARIO">Diário</option>
                            <option value="SEMANAL">Semanal</option>
                            <option value="MENSAL">Mensal</option>
                            <option value="ANUAL">Anual</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        <label for="observacoes" class="form-label">Observacoes</label>
                        <textarea rows="4" class="form-control" name="observacoes" id="observacoes" placeholder="Observação..."></textarea>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <a href="{{ Route('movimentacoes.index') }}" class="btn btn-secondary" role="button">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
