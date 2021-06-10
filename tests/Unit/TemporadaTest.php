<?php

namespace Tests\Unit;

use App\Models\Episodio;
use App\Models\Temporada;
use Tests\TestCase as TestsTestCase;

class TemporadaTest extends TestsTestCase
{

    private $temporada;

    protected function setUp(): void 
    {
        parent::setUp();

        $temporada = new Temporada();

        $episodio1 = new Episodio();
        $episodio1->assistido = true;
        
        $episodio2 = new Episodio();
        $episodio2->assistido = false;

        $episodio3 = new Episodio();
        $episodio3->assistido = true;

        $temporada->episodios->add($episodio1);
        $temporada->episodios->add($episodio2);
        $temporada->episodios->add($episodio3);

        $this->temporada = $temporada;
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testeBuscaPorEpisodiosAssistidos()
    {
        
        $episodiosAssitidos = $this->temporada->getEpisodiosAssistidos();
        $this->assertCount(2, $episodiosAssitidos);

        foreach ($episodiosAssitidos as $episodio) {
            $this->assertTrue($episodio->assistido);
        }
    }

    public function testeBuscaTodosOsEpisodios()
    {
        $episodios = $this->temporada->episodios;

        $this->assertCount(3, $episodios);
    }
}
