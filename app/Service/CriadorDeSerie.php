<?php

namespace App\Service;

use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(string $nomeSerie, int $qtd_temporadas, int $ep_por_temporada): Serie
    {
        DB::beginTransaction();
            $serie = Serie::create(['nome' => $nomeSerie]);
            $this->criarTemporada($qtd_temporadas, $serie, $ep_por_temporada);
        DB::commit();
        
        return $serie;
    }

    public function criarTemporada(int $qtd_temporadas, Serie $serie, int $ep_por_temporada)
    {
        for ($i = 1; $i <= $qtd_temporadas; $i++) {
            $temporada =  $serie->temporadas()->create(['numero' => $i]);
        }

        $this->criarEpisodio($ep_por_temporada, $temporada);
    }

    public function criarEpisodio(int $ep_por_temporada, Temporada $temporada)
    {
        for ($j = 1; $j <= $ep_por_temporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
         }
    }
}