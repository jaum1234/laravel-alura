@extends('layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')

@include('mensagem', ['mensagem' => $mensagem])

        <a href="{{ route('form_criar_serie') }}" class="btn btn-dark mb-2">Adicionar</a>
        <ul class="list-group ">
            @foreach ($series as $serie) 
            <li class="list-group-item d-flex align-items-center justify-content-between">
                <span id="nome-serie-{{ $serie->id }}" data-nome-serie="">{{ $serie->nome }}</span>

                <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}" data-input-nome-serie->
                    <input type="text" class="form-control" value="{{ $serie->nome }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                            <i class="fas fa-check"></i>
                        </button>
                        @csrf
                    </div>
                </div>

                <span class="d-flex">
                    <button class="btn btn-info btn-sm me-2" onclick="toggleInput({{ $serie->id }})">
                        <i class="fas fa-edit"></i>
                    </button>
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

        <script>
            function toggleInput(serieId) {
                const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
                const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
                if (nomeSerieEl.hasAttribute('hidden')) {
                    nomeSerieEl.removeAttribute('hidden');
                    inputSerieEl.hidden = true;
                    return;
                }
                inputSerieEl.removeAttribute('hidden');
                nomeSerieEl.hidden = true;
            }

            function editarSerie(serieId) {
                let formData = new FormData();
                const nome = document.querySelector(`#input-nome-serie-${serieId} > input`).value;
                const token = document.querySelector('input[name="_token"]').value;
                
                formData.append('nome', nome);
                formData.append('_token', token)
                
                const url = `/series/${serieId}/editaNome`;
                fetch(url, {
                    body: formData,
                    method: 'POST'
                }).then(() => {
                    toggleInput(serieId);
                    document.getElementById(`nome-serie-${serieId}`).textContent = nome;
                });
                
            }
        </script>
@endsection('conteudo')
