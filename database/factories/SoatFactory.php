<?php

namespace Database\Factories;

use App\Models\Soat;
use Illuminate\Database\Eloquent\Factories\Factory;

class SoatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Soat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'placa' => $this->faker->unique()->bothify('???-###'),
            'fecha_renovacion' => $this->faker->dateTimeBetween('-3 weeks', 'now'),
            'fecha_venc' => $this->faker->dateTimeBetween('now', '+1 month')
        ];
    }
}
