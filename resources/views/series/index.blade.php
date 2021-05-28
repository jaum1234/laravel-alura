@extends('layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')

@if (!empty($mensagem))
<div class="alert alert-success">
{{ $mensagem }}
</div>
@endif
        <a href="{{ route('form_criar_serie') }}" class="btn btn-dark mb-2">Adicionar</a>
        <ul class="list-group ">
            @foreach ($series as $serie) 
            <li class="list-group-item d-flex align-items-center justify-content-between">{{ $serie->nome }}
                <span class="d-flex">
                    <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-info btn-sm ">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    <form method="post" action="/series/remover/{{$serie->id}}"
                                onsubmit="return confirm('Tem certeza que deseja excluir {{$serie->nome}}')">
                        @csrf
                        <!--@method('DELETE')-->
                        <button class="btn btn-danger btn-sm ms-2"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </span>
            </li>
            @endforeach                 <!--Substitui a necessidade de utilizar a sintaxe PHP-->
            
        </ul>
@endsection('conteudo')
