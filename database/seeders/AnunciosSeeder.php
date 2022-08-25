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

        DB::table('anuncios')->insert([
            'titulo' => "ANUNCIO APROBACIÓN ORDENANZAS 2022.",
            'descripcion' => "ANUNCIO PUBLICACION BOE Nº 205 ORDENANZAS",
            'enlace' => " https://www.boe.es/boe/dias/2022/08/12/pdfs/BOE-S-2022-193.pdf",
            'documento' => "publicacion_0.pdf"
        ]);

        DB::table('anuncios')->insert([
            'titulo' => "EDICTO APROBACION DE PADRONES PRIMER PERIODO DE COBRANZA 2022",
            'descripcion' => "ANUNCIO PUBLICACION BOE Nº 2",
            'enlace' => " https://www.boe.es/boe/dias/2022/08/12/pdfs/BOE-S-2022-193.pdf",
            'documento' => "publicacion_0.pdf"
        ]);
        DB::table('anuncios')->insert([
            'titulo' => "EDICTO APROBACION DE PADRONES SEGUNDO PERIODO DE COBRANZA 2022",
            'descripcion' => "ANUNCIO PUBLICACION BOE Nº ",
            'enlace' => " https://www.boe.es/boe/dias/2022/08/12/pdfs/BOE-S-2022-193.pdf",
            'documento' => "publicacion_0.pdf"
        ]);
        DB::table('anuncios')->insert([
            'titulo' => "INICIO PERIODO DE COBRANZA",
            'descripcion' => "ANUNCIO PUBLICACION BOE Nº ",
            'enlace' => " https://www.boe.es/boe/dias/2022/08/12/pdfs/BOE-S-2022-193.pdf",
            'documento' => "publicacion_0.pdf"
        ]);
        DB::table('anuncios')->insert([
            'titulo' => "APORBACION PROVICIONAL IAE",
            'descripcion' => "ANUNCIO PUBLICACION BOE Nº ",
            'enlace' => " https://www.boe.es/boe/dias/2022/08/12/pdfs/BOE-S-2022-193.pdf",
            'documento' => "publicacion_0.pdf"
        ]);

        for ($i = 0; $i < 3; $i++) {
            DB::table('anuncios')->insert([
                'titulo' => Str::random(10),
                'descripcion' => Str::random(10),
                'enlace' => Str::random(10)
            ]);
        }
    }
}
