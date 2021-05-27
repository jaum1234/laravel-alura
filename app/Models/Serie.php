<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Serie extends Model
{
    protected $table = 'series';
    //por padrao, o laravel pega o nome da classe, colocar todas as letras em minusculo e deixa a palavra no plural. Desse modo, quando um caso como o a cima acontecer, essa linha de código pode ser omitida.

    public $timestamps = false;
    protected $fillable = ['nome'];
}