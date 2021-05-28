@extends('layout')

@section('cabecalho')
Adicionar Séries
@endsection

@section('conteudo')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form method="post">
            @csrf
            <div class="row align-items-center">
                <div class="col col-8">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome">
                </div>
                <div class="col col-2">
                    <label for="nome">Numero de temporadas</label>
                    <input type="number" class="form-control" name="qtd_temporadas">
                </div>
                <div class="col col-2">
                    <label for="nome">Numero de episodios</label>
                    <input type="number" class="form-control" name="ep_por_temporada">
                </div>
            </div>
            <button class="btn btn-primary mt-2">Adicionar</button>
        </form>
@endsection



