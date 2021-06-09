<?php

use Faker\Guesser\Name;
use App\Models\Episodio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\EpisodiosController;
use App\Http\Controllers\TemporadasController;
use App\Http\Middleware\Autenticador;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/series', [SeriesController::class, 'index'])
    ->name('listar_series');


Route::get('/series/criar', [SeriesController::class, 'create'])
    ->name('form_criar_serie')
    ->middleware('autenticador');
    
Route::post('/series/criar', [SeriesController::class, 'store'])
->middleware('autenticador');
Route::post('/series/remover/{id}', [SeriesController::class, 'destroy'])
->middleware('autenticador');

Route::get('/series/{serieId}/temporadas', [TemporadasController::class, 'index']);

Route::post('/series/{id}/editaNome', [SeriesController::class, 'editaNome']);

Route::get('/temporadas/{temporada}/episodios', [EpisodiosController::class, 'index']);

Route::post('/temporadas/{temporada}/episodios/assitir', [EpisodiosController::class, 'assistir']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login/do', [LoginController::class, 'login']);

Route::get('/registro', [RegistroController::class, 'create']);
Route::post('/registro/do', [RegistroController::class, 'store']);

Route::get('/sair', function() {
    Auth::logout();

    return redirect('/login');
});

