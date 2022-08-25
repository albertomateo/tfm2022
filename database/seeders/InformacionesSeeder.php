<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class InformacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 4; $i++) {
            DB::table('informacions')->insert([
                'seccion' => 'Seccion una',
                'titulo' => Str::random(15),
                'subtitulo' => Str::random(10),
                'contenido' => Str::random(10),
                'pie' => Str::random(10),
                'orden' => Str::random(2)
            ]);
        }
        for ($i = 0; $i < 4; $i++) {
            DB::table('informacions')->insert([
                'seccion' => 'Seccion dos',
                'titulo' => Str::random(30),
                'subtitulo' => Str::random(30),
                'contenido' => Str::random(20),
                'pie' => Str::random(30),
                'orden' => Str::random(2)
            ]);
        }
        for ($i = 0; $i < 4; $i++) {
            DB::table('informacions')->insert([
                'seccion' => 'Seccion tres',
                'titulo' => Str::random(30),
                'subtitulo' => Str::random(30),
                'contenido' => Str::random(20),
                'pie' => Str::random(30),
                'orden' => Str::random(2)
            ]);
        }
    }
}
