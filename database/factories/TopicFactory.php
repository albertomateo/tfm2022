<?php

namespace Database\Factories;
use App\Models\Topic;  // lo pongo a mano

use Illuminate\Database\Eloquent\Factories\Factory;

class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Topic::class;  // lo pongo a mano

    public function definition()
    {
        return [
            //
            'organismo' => $this->faker->randomElement(['RENTAS', 'ERESSAN', 'CATASTRO','DIPUTACION']),
            'tema' => $this->faker->text($maxNbChars = 15),         
            'detalle' => $this->faker->text($maxNbChars = 15),
            'observaciones' => $this->faker->text($maxNbChars = 15),
            'enlace' =>  $this->faker->url(),

        ];
    }
}
