<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AnunciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anuncios')->insert([
            'titulo' => "CITACION NOTIFICACION POR COMPARECENCIA.",
            'descripcion' => "ANUNCIO PUBLICACION BOE Nº 193 PROCEDIMIENTO CITACION NOTIFICACION POR COMPARECENCIA.",
            'enlace' => " https://www.boe.es/boe/dias/2022/08/12/pdfs/BOE-S-2022-193.pdf",
            'documento' => "publicacion_0.pdf"
        ]);
        for ($i = 0; $i < 10; $i++) {
            DB::table('anuncios')->insert([
                'titulo' => Str::random(10),
                'descripcion' => Str::random(10),
                'enlace' => Str::random(10)
            ]);
        }
    }
}
