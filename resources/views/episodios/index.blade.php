@extends('layout')


@section('conteudo')

@include('mensagem', ['mensagem' => $mensagem])


<form action="/temporadas/{{ $temporadaId }}/episodios/assitir" method="post">
    @csrf
    <ul class="list-group">
        @foreach ($episodios as $episodio)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Episodio: {{ $episodio->numero }}
            <input type="checkbox" 
            name="episodios[]" 
            value="{{ $episodio->id }}"
            {{ $episodio->assistido ? 'checked' : '' }}>
        </li>
        @endforeach
    </ul>
    
    @auth
    <button class="btn btn-primary mt-2">Salvar</button>
    @endauth
</form>
@endsection