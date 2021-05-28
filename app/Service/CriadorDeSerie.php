<?php

namespace App\Service;

use App\Models\Serie;

class CriadorDeSerie
{
    public function criarSerie(string $nomeSerie, int $qtd_temporadas, int $ep_por_temporada): Serie
    {
        $serie = Serie::create(['nome' => $nomeSerie]);
        $qtdTemporadas = $qtd_temporadas;
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
           $temporada =  $serie->temporadas()->create(['numero' => $i]);

           for ($j = 1; $j <= $ep_por_temporada; $j++) {
               $episodio = $temporada->episodios()->create(['numero' => $j]);
            }
        }
        return $serie;
    }
}