<?php

namespace Tests\Unit;

use App\Models\Serie;
use App\Service\CriadorDeSerie;
use PHPUnit\Framework\TestCase;
use App\Service\RemovedorDeSerie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase as TestsTestCase;

class RemovedorDeSerieTest extends TestsTestCase
{
    use RefreshDatabase;

    private Serie $serie;
    protected function setUp(): void
    {
        parent::setUp();

        $criadorDeSerie = new CriadorDeSerie();
        $this->serie = $criadorDeSerie->criarSerie('nome', 1, 1);
    }
    
    public function testeRemoverSerie()
    {
        $removedorDeSerie = new RemovedorDeSerie();
        $nomeSerie = $removedorDeSerie->removerSerie($this->serie->id);

        $this->assertIsString($nomeSerie);
        $this->assertEquals('nome', $this->serie->nome);
        $this->assertDatabaseMissing('series', ['id' => $this->serie->id]);
    }
}
