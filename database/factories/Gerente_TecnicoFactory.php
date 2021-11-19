<?php

namespace Database\Factories;

use App\Models\Gerente_Tecnico;
use Illuminate\Database\Eloquent\Factories\Factory;

class Gerente_TecnicoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gerente_Tecnico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'DNI' => $this->faker->unique()->numerify($string = '########')
        ];
    }
}
