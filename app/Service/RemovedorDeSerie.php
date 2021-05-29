<?php

namespace App\Service;

use Illuminate\Support\Facades\DB;
use App\Models\{Serie, Temporada, Episodio};

class RemovedorDeSerie
{
    public function removerSerie(int $serieId): string
    {
        DB::beginTransaction();
            $serie = Serie::find($serieId);
            $nomeSerie = $serie->nome;
            
            $this->removerTemporada($serie);
            $serie->delete();
        DB::commit();

        return $nomeSerie;
    }

    private function removerTemporada($serie): void
    {
        $serie->temporadas->each(function (Temporada $temporada) {
            $this->removerEpisodio($temporada);
            $temporada->delete();
        });
    }

    private function removerEpisodio($temporada)
    {
        $temporada->episodios->each(function (Episodio $episodio) {
            $episodio->delete();
        });
    }
}