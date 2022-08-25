<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class EnlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enlaces')->insert([
            'titulo' => "Pagina WEB de Catastro",
            'sitioweb' => "https://www.catastro.minhap.es/"
        ]);

        DB::table('enlaces')->insert([
            'titulo' => "Dipucación de Cadiz",
            'sitioweb' => "https://dipucadiz.es/"
        ]);

        DB::table('enlaces')->insert([
            'titulo' => "Servicio Provincial de Recaudación y Gestion Tributaria",
            'sitioweb' => "https://sprygt.dipucadiz.es/"
        ]);

        DB::table('enlaces')->insert([
            'titulo' => "Ayuntamiento de Sanlucar de Barrameda",
            'sitioweb' => "https://www.sanlucardebarrameda.es/"
        ]);

        DB::table('enlaces')->insert([
            'titulo' => "cita previa Ayuntamiento Sanlucar",
            'sitioweb' => "https://citaprevia.sanlucardebarrameda.es/index.php"
        ]);

        DB::table('enlaces')->insert([
            'titulo' => "Patronato de turismo Sanlucar de Bda.",
            'sitioweb' => "https://www.sanlucarturismo.com/"
        ]);
        DB::table('enlaces')->insert([
            'titulo' => "Patronato de deportes Sanlucar de Bda.",
            'sitioweb' => "https://www.sanlucardebarrameda.es/"
        ]);

        DB::table('enlaces')->insert([
            'titulo' => "Gerencia de Urbanismo",
            'sitioweb' => "http://www.gmusanlucar.es/"
        ]);
        
        for ($i = 0; $i < 7; $i++) {
            DB::table('enlaces')->insert([
                'titulo' => Str::random(10),
                'sitioweb' => Str::random(10)
            ]);
        }
    }
}
