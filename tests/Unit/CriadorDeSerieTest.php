<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Serie;
use App\Service\CriadorDeSerie;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CriadorDeSerieTest extends TestCase
{
    use RefreshDatabase;
    
    public function testeCriarSerie()
    {
        $criadorDeSerie = new CriadorDeSerie();
        $nomeSerie = 'teste';
        $serieCriada = $criadorDeSerie->criarSerie($nomeSerie, 1, 1);

        $this->assertInstanceOf(Serie::class, $serieCriada);
        $this->assertDatabaseHas('series', [
            'nome' => $nomeSerie
            ]);
        $this->assertDatabaseHas('temporadas', [
            'serie_id' => $serieCriada->id,
            'numero' => 1
        ]);
        $this->assertDatabaseHas('episodios', [
            'numero' => 1
        ]);
    }
}
