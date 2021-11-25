<?php

namespace Database\Factories;

use App\Models\PermisoMTC;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermisoMTCFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PermisoMTC::class;

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
            'fecha_venc' => $this->faker->dateTimeBetween('now', '+2 months')
        ];
    }
}
