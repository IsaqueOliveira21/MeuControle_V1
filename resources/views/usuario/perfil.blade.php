@extends('usuario.template')

@section('titulo', 'MEU PERFIL')

@section('conteudo')
        <!-- Hero -->
        <div class="bg-image my-3" style="background-image: url({{ asset('assets/media/photos/photo12@2x.jpg') }});">
            <div class="bg-primary-op">
                <div class="content content-full">
                    <div class="py-1 text-center">
                        <a class="img-link" href="#">
                            <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ !isset($usuario->photo) ? asset('assets/media/avatars/avatar10.jpg') : asset('/storage/fotos/'.$usuario->photo) }}" alt="">
                        </a>
                        <h1 class="fw-bold my-2 text-white">{{ $usuario->name }}</h1>
                    </div>
                </div>
            </div>
        </div>

    <div class="block block-rounded">
        <div class="block-content block-header-default">
            <form action="{{ Route('user.updatePerfil') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-4">
                    <div class="col-6">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nome" value="{{ $usuario->name }}">
                    </div>
                    <div class="col-6">
                        <label for="email" class="form-label">E-mail</label>
                        <div class="input-group">
                            <input type="email" class="form-control" id="email" name="email" value="{{ $usuario->email }}" readonly>
                            <a href="#" class="btn btn-secondary" role="button">Alterar</a>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12 overflow-hidden">
                        <div class="mb-4">
                            <label class="form-label" for="foto">Foto</label>
                            <input class="form-control" type="file" id="foto" name="foto" accept="image/*">
                        </div>
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
