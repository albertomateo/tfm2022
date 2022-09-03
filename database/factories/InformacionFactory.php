<?php

namespace Database\Factories;

use App\Models\Informacion;  // lo pongo a mano
use Illuminate\Database\Eloquent\Factories\Factory;

class InformacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Informacion::class;  // lo pongo a mano

    public function definition()
    {
        return [
            'seccion' =>  $this->faker->randomElement(['Economico', 'Laboral', 'Otros']),
            'titulo' =>  $this->faker->word(),
            // 'subtitulo' => $this->faker->sentences($nb = 1, $asText = false) ,
            'subtitulo' => $this->faker->text($maxNbChars = 5)  ,
            'contenido' => $this->faker->text($maxNbChars = 45)   ,
            'pie' => $this->faker->word(),
            'orden' => $this->faker->randomDigit()
         ];
    }
}
