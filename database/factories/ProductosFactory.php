<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sku' => $this->faker->numerify('###########'),
            'nombre' => Str::random(10),
            'id_categoria' => $this->faker->randomNumber(1, true),
            'descripcion' => Str::random(20),
            'precio' => $this->faker->randomNumber(3, true),
            'cantidad' => $this->faker->randomNumber(2, true),
            'estado' => 'Si'
        ];
    }
}
