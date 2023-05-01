@extends('usuario.template')

@section('titulo', 'CADASTRAR AMIGO')

@section('conteudo')
    <div class="block block-rounded">
        <div class="block-content block-header-default">
            <form action="{{ isset($amigo) ? Route('amigos.update', $amigo->id) : Route('amigos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($amigo))
                    @method('PUT')
                @endif
                <div class="row mb-4">
                    <div class="col-6">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="{{ isset($amigo) ? $amigo->nome : '' }}">
                    </div>
                    <div class="col-6">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="tel" class="form-control" name="telefone" id="telefone" placeholder="(00) 00000-0000" value="{{ isset($amigo) ? $amigo->telefone : '' }}">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-6 col-xl-6 overflow-hidden">
                        <div class="mb-4">
                            <label class="form-label" for="foto">Foto</label>
                            <input class="form-control" type="file" id="foto" name="foto" accept="image/*">
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="limite" class="form-label">Limite Emprestimo</label>
                        <input type="number" min="0" class="form-control" name="limite" id="limite" placeholder="1000" value="{{ isset($amigo) ? $amigo->limite_emprestimo : '' }}">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <button type="submit" class="btn btn-outline-success">Salvar</button>
                        <a href="{{ Route('amigos.index') }}" class="btn btn-outline-secondary" role="button">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
