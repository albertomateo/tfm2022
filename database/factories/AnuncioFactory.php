<?php

namespace Database\Factories;
use App\Models\Anuncio; // lo pongo a mano
use Illuminate\Database\Eloquent\Factories\Factory;

class AnuncioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Anuncio::class;  // lo pongo a mano
    public function definition()
    {
        return [
            //
            'titulo' => $this->faker->text($maxNbChars = 15),
            'descripcion' => $this->faker->text($maxNbChars = 15),
            'enlace' =>  $this->faker->url(),
        ];
    }
}
