<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request) 
    {
        //var_dump($request->query('nome2'));

        $series = [
            'Grey Anatomy',
            'Lost',
            'Agents of SHIELD'
        ];
    
        return view('series.index', compact('series'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $nome = $request->get('nome');

        $serie = new Serie();
        $serie->nome = $nome;
        $serie->save();
    }
}