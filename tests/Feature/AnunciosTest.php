<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnunciosTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function test_MetodoIndex()
    {
        $this->get('/anuncios')
            ->assertStatus(200)
            ->assertSee('CITACION');
    }
    public function test_filtrarConParametro_2022()
    {
        $this->json('GET', '/anuncios/filtrar/2022')

        ->assertStatus(200);
    }
    public function test_borrar_registro_primero()
    {
        $this->delete('/anuncios/1')

        ->assertStatus(302);
    }
}
