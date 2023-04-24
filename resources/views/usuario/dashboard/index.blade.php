@extends('usuario.template')

@section('titulo', 'DASHBOARD')

@section('conteudo')
    <div class="content">
        <div class="block block-rounded mb-5">
            <div class="block-content">
                <div id="graficoGastosGanhos">
                </div>
            </div>
        </div>
        <div class="block block-rounded mb-5">
            <div class="block-content">
                <div id="graficoGastosGanhosColuna">
                </div>
            </div>
        </div>
    </div>
@endsection
