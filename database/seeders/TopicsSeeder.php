<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('topics')->insert([
            'organismo' => 'RENTAS',
            'tema' => 'IBI-Bonificacion Familias Numerosas'            ,
            'detalle' => 'Información Solicitud de bonificación en el impuesto sobre bienes inmuebles por familia numerosa',
            'observaciones' => '',
            'enlace' => '',

        ]);

        DB::table('topics')->insert([
            'organismo' => 'RENTAS',
            'tema' => 'IBI- División de cuotas'            ,
            'detalle' => 'Solicitud de división de cuota en el Impuesto sobre bienes inmuebles por cotitularidad',
            'observaciones' => '',
            'enlace' => '',

        ]);
        DB::table('topics')->insert([
            'organismo' => 'RENTAS',
            'tema' => 'PLUSVALIAS - Presentación'            ,
            'detalle' => 'Presentacion de documentación obligatoria',
            'observaciones' => '',
            'enlace' => '',

        ]);

        for  ($i =0;$i<5;$i++){
            DB::table('topics')->insert([
                'organismo' => 'RENTAS',
                'tema' => Str::random(10),
                'detalle' => Str::random(10),
                'observaciones' => Str::random(10),
                'enlace' => Str::random(10),

            ]);
        }
        for  ($i =0;$i<5;$i++){
            DB::table('topics')->insert([
                'organismo' => 'CATASTRO',
                'tema' => Str::random(10),
                'detalle' => Str::random(10),
                'observaciones' => Str::random(10),
                'enlace' => Str::random(10),

            ]);
        }
        for  ($i =0;$i<5;$i++){
            DB::table('topics')->insert([
                'organismo' => 'DIPUTACION',
                'tema' => Str::random(10),
                'detalle' => Str::random(10),
                'observaciones' => Str::random(10),
                'enlace' => Str::random(10),

            ]);
        }
        for  ($i =0;$i<5;$i++){
            DB::table('topics')->insert([
                'organismo' => 'ERESSAN',
                'tema' => Str::random(10),
                'detalle' => Str::random(10),
                'observaciones' => Str::random(10),
                'enlace' => Str::random(10),

            ]);
        }
    }
}
