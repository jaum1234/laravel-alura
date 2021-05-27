<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $nome = $request->get('nome');

        $serie = Serie::create([
            'nome' => $nome
        ]);

        $request->session()->flash('mensagem',
                                 "Serie {$serie->id} criada com sucesso: {$serie->nome}"
                                );

        //$serie = Serie::create($request->all());
        //adiciona todos os dados do formulario

        return redirect()->route('listar_series');    

        /*
        $serie = new Serie();
        $serie->nome = $nome;
        $serie->save();
        */
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->flash('mensagem',
                                 "Serie removida com sucesso"
                                );
        return redirect()->route('listar_series');
    }
}