<?php

namespace Database\Seeders;

use App\Models\Informacion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(AnunciosSeeder::class);
        $this->call(UsuarioDefectoSeeder::class);
        $this->call(topicsSeeder::class);
        $this->call(InformacionesSeeder::class);
        // factory('Curso\User', 50)->create();
        $this->call(EnlacesSeeder::class);
        // \App\Models\Informacion::factory(10)->create();
        // Informacion::factory()->count(50)->create();

    }
}

