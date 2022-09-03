<?php

namespace Database\Seeders;

use App\Models\Topic;
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
        DB::table('topics')->insert([
            'organismo' => 'RENTAS',
            'tema' => 'AUTOLIQUIDACIONES - Vehiculos'            ,
            'detalle' => 'Autoliquidaciones',
            'observaciones' => '',
            'enlace' => '',

        ]);
        DB::table('topics')->insert([
            'organismo' => 'RENTAS',
            'tema' => 'PLUSVALIAS - Vehiculos'            ,
            'detalle' => 'Presentacion de documentación obligatoria',
            'observaciones' => '',
            'enlace' => '',

        ]);

        DB::table('topics')->insert([
            'organismo' => 'CATASTRO',
            'tema' => '900-D'            ,
            'detalle' => 'Declaraciones de Alta y Bajas',
            'observaciones' => '',
            'enlace' => '',
        ]);

        DB::table('topics')->insert([
            'organismo' => 'CATASTRO',
            'tema' => 'Recursos'            ,
            'detalle' => 'Presentacion de Documentación',
            'observaciones' => '',
            'enlace' => '',
        ]);

        DB::table('topics')->insert([
            'organismo' => 'CATASTRO',
            'tema' => 'Requerimientos y Audiencias'            ,
            'detalle' => 'Presentacion de Documentación',
            'observaciones' => '',
            'enlace' => '',
        ]);
        



        
        DB::table('topics')->insert([
            'organismo' => 'DIPUTACION',
            'tema' => 'Requerimientos y Audiencias'            ,
            'detalle' => 'Presentacion de Documentación',
            'observaciones' => '',
            'enlace' => '',
        ]);
        DB::table('topics')->insert([
            'organismo' => 'DIPUTACION',
            'tema' => 'Interposición de Recursos'            ,
            'detalle' => 'Interposición de Recursos',
            'observaciones' => '',
            'enlace' => '',
        ]);
        DB::table('topics')->insert([
            'organismo' => 'DIPUTACION',
            'tema' => ' Planes Personalizados de Pago'            ,
            'detalle' => ' Planes Personalizados de Pago',
            'observaciones' => '',
            'enlace' => '',
        ]);
        DB::table('topics')->insert([
            'organismo' => 'DIPUTACION',
            'tema' => ' Gestión de Fraccionamientos EJECUTIVA'            ,
            'detalle' => ' Gestión de Fraccionamientos EJECUTIV',
            'observaciones' => '',
            'enlace' => '',
        ]);       

        DB::table('topics')->insert([
            'organismo' => 'DIPUTACION',
            'tema' => 'Domiciliaciones Bancarias'            ,
            'detalle' => ' Domiciliaciones Bancarias',
            'observaciones' => '',
            'enlace' => '',
        ]);    

        
        DB::table('topics')->insert([
            'organismo' => 'DIPUTACION',
            'tema' => 'Informe de Situación de Recibos'            ,
            'detalle' => 'Informe de Situación de Recibos',
            'observaciones' => '',
            'enlace' => '',
        ]);    

                
        DB::table('topics')->insert([
            'organismo' => 'DIPUTACION',
            'tema' => 'Informe de deuda'            ,
            'detalle' => 'Informe de deuda',
            'observaciones' => '',
            'enlace' => '',
        ]);   

        DB::table('topics')->insert([
            'organismo' => 'DIPUTACION',
            'tema' => 'Informe de Inexistencia de Deudas'            ,
            'detalle' => 'Informe de Inexistencia de Deudas',
            'observaciones' => '',
            'enlace' => '',
        ]);   
        DB::table('topics')->insert([
            'organismo' => 'DIPUTACION',
            'tema' => 'Embargos'            ,
            'detalle' => 'Embargos',
            'observaciones' => '',
            'enlace' => '',
        ]);   
        DB::table('topics')->insert([
            'organismo' => 'ERESSAN',
            'tema' => 'Pago Alquiler de viviendas'            ,
            'detalle' => 'Pago Alquiler de viviendas',
            'observaciones' => '',
            'enlace' => '',
        ]);   

        DB::table('topics')->insert([
            'organismo' => 'ERESSAN',
            'tema' => 'Pago ayuda a Domicilio'            ,
            'detalle' => 'Pago ayuda a Domicilio',
            'observaciones' => '',
            'enlace' => '',
        ]);  
        DB::table('topics')->insert([
            'organismo' => 'ERESSAN',
            'tema' => 'Pago liquidaciones en voluntaria'            ,
            'detalle' => 'Pago liquidaciones en voluntaria',
            'observaciones' => '',
            'enlace' => '',
        ]);  
        DB::table('topics')->insert([
            'organismo' => 'ERESSAN',
            'tema' => 'Fraccionamientos en Voluntaria'            ,
            'detalle' => 'Fraccionamientos en Voluntaria',
            'observaciones' => '',
            'enlace' => '',
        ]);  
        DB::table('topics')->insert([
            'organismo' => 'ERESSAN',
            'tema' => 'Aplazamientos en Voluntaria'            ,
            'detalle' => 'Aplazamientos en Voluntaria',
            'observaciones' => '',
            'enlace' => '',
        ]);  
        
        Topic::factory()->count(50)->create(); // Ejecuto aqui el Factory

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
