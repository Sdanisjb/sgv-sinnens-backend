<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ObservacionMantenimientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_registro' => $this->faker->randomNumber(),
            'descripcion' => $this->faker->text()
        ];
    }
}
