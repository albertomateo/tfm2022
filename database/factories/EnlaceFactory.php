<?php

namespace Database\Factories;
use App\Models\Enlace; // lo pongo a mano

use Illuminate\Database\Eloquent\Factories\Factory;

class EnlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Enlace::class;  // lo pongo a mano
    
    public function definition()
    {
        return [
            'titulo' =>  $this->faker->text($maxNbChars = 15) ,
            'sitioweb' => $this->faker->url(),
        ];
    }
}
