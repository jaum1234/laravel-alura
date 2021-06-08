@extends('layout')

@section('cabecalho')
    Registro
@endsection

@section('conteudo')
    <form method="post" action="/registro/do">
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" required class="form-control">
        </div>


        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required min="1" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            Registrar
        </button>

        <a href="/login" class="btn btn-secondary mt-3">
            Já possuo uma conta
        </a>
    </form>
@endsection