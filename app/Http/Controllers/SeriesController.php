<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use App\Service\CriadorDeSerie;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Episodio;
use App\Models\Temporada;
use App\Service\RemovedorDeSerie;

class SeriesController extends Controller
{
    public function index(Request $request) 
    {
        //var_dump($request->query('nome2'));

        //$series = Serie::all();
        $series = Serie::query()
                            ->orderBy('nome')
                            ->get();
        $mensagem = $request->session()->get('mensagem');
    
        return view('series.index', compact('series', 'mensagem')); 
    }                               /* ['series' => $series] */

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie)
    {
        //$nome = $request->get('nome');
        //$serie = Serie::create($request->all());
        
        $serie = $criadorDeSerie->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
        );
        /*
        $serie = Serie::create([
            'nome' => $nome
        ]);
        */

        $request->session()->flash('mensagem',
                                 "Serie {$serie->id}, suas temporadas e episodios criada com sucesso: {$serie->nome}"
                                );

        //adiciona todos os dados do formulario

        return redirect()->route('listar_series');    

        /*
        $serie = new Serie();
        $serie->nome = $nome;
        $serie->save();
        */
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {   
        $nomeSerie = $removedorDeSerie->removerSerie($request->id);
        /*
        $serie = Serie::find($request->id);
        $serie->temporadas->each(function (Temporada $temporada) {
            $temporada->episodios->each(function (Episodio $episodio) {
                $episodio->delete();
            });
            $temporada->delete();
        });
        Serie::destroy($request->id);
        */
        //$serie->delete(); 
        //ambos os modos funcionam para remover um item do banco de dados...
        $request->session()->flash('mensagem',
                                    "Serie '$nomeSerie' removida com sucesso"
                                );
        return redirect()->route('listar_series');
    }
}