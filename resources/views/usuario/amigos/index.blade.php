@extends('usuario.template')

@section('titulo', 'AMIGOS')

@section('conteudo')

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Meus Amigos</h3>
            <a href="{{ Route('amigos.create') }}" class="btn btn-success" role="button" title="Adicionar Amigo">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="content">
            <div class="row">
                @foreach($amigos as $amigo)
                    <div class="col-md-6 col-xl-3">
                        <a class="block block-rounded bg-gd-dusk push" href="#" data-bs-toggle="modal" data-bs-target="#modalDetalheAmigo" data-id="{{$amigo->id}}"
                           data-item='
                            <div class="block block-rounded">
                                <div class="block-content block-content-full bg-gd-sublime ribbon ribbon-left ribbon-glass">
                                  <div class="text-center py-5">
                                    <h4 class="fw-bold text-white text-uppercase mb-0">{{$amigo->nome}}</h4>
                                  </div>
                                </div>
                            </div>
                            <div>
                                <ul>
                                    <li>Telefone: <b>{{$amigo->telefone}}</b></li>
                                    <li>Limite Emprestimo: <p class="text-primary">R$ {{$amigo->limite_emprestimo}}</p></li>
                                </ul>
                            </div>
                            '
                           data-url="amigos/edit">
                            <div class="block-content block-content-full d-flex flex-row-reverse align-items-center justify-content-between">
                                <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{empty($amigo->foto) ? asset('assets/media/avatars/avatar15.jpg') : asset('/storage/fotos/'.$amigo->foto)}}" alt="">
                                <div class="me-3">
                                    <p class="fw-semibold text-white mb-0">{{ $amigo->nome }}</p>
                                    <p class="fs-sm text-white-75 mb-0">
                                        Limite: R$ {{ $amigo->limite_emprestimo }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="modal" id="modalDetalheAmigo" name="modalDetalheAmigo" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Detalhes do Amigo</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <p id="detalheAmigo"></p>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Fechar</button>
                        <a href="#" id="btnModalEdit" class="btn btn-sm btn-primary">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
