<?php

namespace Database\Factories;

use App\Models\Operador;
use Illuminate\Database\Eloquent\Factories\Factory;

class OperadorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Operador::class;

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
