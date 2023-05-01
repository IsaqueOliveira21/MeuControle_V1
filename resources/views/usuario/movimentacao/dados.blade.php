@extends('usuario.template')

@section('titulo', 'DETALHES DA MOVIMENTAÇÃO')

@section('conteudo')
    <div class="block block-rounded">
        <div class="block-content block-header-default">
            <form action="{{ isset($movimentacao) ? Route('movimentacoes.update', $movimentacao->id) : Route('movimentacoes.store') }}" method="POST" enctype="application/x-www-form-urlencoded">
                @csrf
                @if(isset($movimentacao))
                    @method('PUT')
                @endif
                <div class="row mb-4">
                    <div class="col-6">
                        <label for="conta_id" class="form-label">Conta</label>
                        <select class="form-select" name="conta_id" id="conta_id" {{ (Route::currentRouteName() === 'movimentacoes.detalhes') ? 'disabled' : ''}}>
                            <option value="">SELECIONAR CONTA</option>
                            @foreach($contas as $conta)
                                <option value="{{ $conta->id }}" {{(isset($movimentacao->conta_id) && $movimentacao->conta_id === $conta->id) ? 'selected' : ''}}>{{ $conta->nome_conta }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="data" class="form-label">Data</label>
                        <input type="text" class="js-datepicker form-control" id="data"
                               value="{{$movimentacao->data ?? '' }}"
                               name="data" data-week-start="1" data-autoclose="true"
                               data-today-highlight="true" data-date-format="dd/mm/yyyy"
                               placeholder="dd/mm/aaaa" autocomplete="off" {{ (Route::currentRouteName() === 'movimentacoes.detalhes') ? 'disabled' : ''}}>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <label for="tipo_movimentacao" class="form-label">Tipo de Movimentação</label>
                        <select class="form-select" name="tipo_movimentacao" id="tipo_movimentacao" {{ (Route::currentRouteName() === 'movimentacoes.detalhes') ? 'disabled' : ''}}>
                            <option value="ENTRADA" {{isset($movimentacao->tipo) && $movimentacao->tipo === 'ENTRADA' ? 'selected' : ''}}>Entrada</option>
                            <option value="SAIDA" {{isset($movimentacao->tipo) && $movimentacao->tipo === 'SAIDA' ? 'selected' : ''}}>Saída</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="forma_pagamento" class="form-label">Forma de Pagamento</label>
                        <select class="form-select" name="forma_pagamento" id="forma_pagamento" {{ (Route::currentRouteName() === 'movimentacoes.detalhes') ? 'disabled' : ''}}>
                            <option value="A VISTA" {{isset($movimentacao->forma_pagamento) && $movimentacao->forma_pagamento === 'A VISTA' ? 'selected' : ''}}>A Vista</option>
                            <option value="DEBITO" {{isset($movimentacao->forma_pagamento) && $movimentacao->forma_pagamento === 'DEBITO' ? 'selected' : ''}}>Débito</option>
                            <option value="CREDITO" {{isset($movimentacao->forma_pagamento) && $movimentacao->forma_pagamento === 'CREDITO' ? 'selected' : ''}}>Crédito</option>
                            <option value="PIX" {{isset($movimentacao->forma_pagamento) && $movimentacao->forma_pagamento === 'PIX' ? 'selected' : ''}}>PIX</option>
                            <option value="TRANSFERENCIA" {{isset($movimentacao->forma_pagamento) && $movimentacao->forma_pagamento === 'TRANSFERENCIA' ? 'selected' : ''}}>Transferência</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <label for="descricao" class="form-label">Descrição</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" value="{{ $movimentacao->descricao ?? '' }}" {{ (Route::currentRouteName() === 'movimentacoes.detalhes') ? 'readonly' : ''}}>
                    </div>
                    <div class="col-6">
                        <label for="parcelado" class="form-label">Parcelado</label>
                        <input type="number" class="form-control" name="parcelado" id="parcelado" min="0" step="1" placeholder="12x" value="{{ $movimentacao->parcelado ?? '' }}" {{ (Route::currentRouteName() === 'movimentacoes.detalhes') ? 'readonly' : ''}}>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <label for="valor_total" class="form-label">Valor Total</label>
                        <input type="number" class="form-control" name="valor_total" id="valor_total" placeholder="R$ 100,00" value="{{ $movimentacao->valor_total ?? '' }}" {{ (Route::currentRouteName() === 'movimentacoes.detalhes') ? 'readonly' : ''}}>
                    </div>
                    <div class="col-6">
                        <label for="recorrencia" class="form-label">Recorrencia</label>
                        <select class="form-select" name="recorrencia" id="recorrencia" {{ (Route::currentRouteName() === 'movimentacoes.detalhes') ? 'disabled' : ''}}>
                            <option value="NAO RECORRENTE" {{isset($movimentacao->recorrencia) && $movimentacao->recorrencia === 'NAO RECORRENTE' ? 'selected' : ''}}>Não Recorrente</option>
                            <option value="DIARIO" {{isset($movimentacao->recorrencia) && $movimentacao->recorrencia === 'DIARIO' ? 'selected' : ''}}>Diário</option>
                            <option value="SEMANAL" {{isset($movimentacao->recorrencia) && $movimentacao->recorrencia === 'SEMANAL' ? 'selected' : ''}}>Semanal</option>
                            <option value="MENSAL" {{isset($movimentacao->recorrencia) && $movimentacao->recorrencia === 'MENSAL' ? 'selected' : ''}}>Mensal</option>
                            <option value="ANUAL" {{ isset($movimentacao->recorrencia) && $movimentacao->recorrencia === 'ANUAL' ? 'selected' : ''}}>Anual</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" id="amigo" name="amigo" {{ isset($movimentacao->amigo_id) ? 'checked' : '' }} {{ (Route::currentRouteName() === 'movimentacoes.detalhes') ? 'disabled' : ''}}>
                            <label class="form-check-label" for="amigo">Compra feita por um amigo?</label>
                        </div>
                        <div id="lista-amigo" class="mt-4" style="display:none;">
                            <div class="col-12">
                                <div class="mb-4">
                                    <select class="js-select2 form-select" id="listaAmigos" name="listaAmigos" style="width: 100%;" data-placeholder="Seus Amigos" {{ (Route::currentRouteName() === 'movimentacoes.detalhes') ? 'disabled' : ''}}>
                                        <option value=""></option>
                                        @foreach($amigos as $amigo)
                                            <option value="{{ $amigo->id }}" {{ (isset($movimentacao->amigo_id) && $movimentacao->amigo_id === $amigo->id) ? 'selected' : '' }}>{{ $amigo->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        <label for="observacoes" class="form-label">Observacoes</label>
                        <textarea rows="4" class="form-control" name="observacoes" id="observacoes" placeholder="Observação..." {{ (Route::currentRouteName() === 'movimentacoes.detalhes') ? 'readonly' : ''}}>{{ $movimentacao->observacao ?? '' }}</textarea>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        @if(Route::currentRouteName() === 'movimentacoes.detalhes')
                            <a href="{{ Route('movimentacoes.edit', $movimentacao->id) }}" class="btn btn-primary" role="button">Editar</a>
                        @else
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        @endif
                        <a href="{{ Route('movimentacoes.index') }}" class="btn btn-secondary" role="button">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        let radio = document.getElementById("amigo");
        let div = document.getElementById("lista-amigo");

        radio.addEventListener("change", function() {
            if (radio.checked) {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        });

        if (radio.checked) {
            div.style.display = "block";
        } else {
            div.style.display = "none";
        }
    </script>
@endsection
