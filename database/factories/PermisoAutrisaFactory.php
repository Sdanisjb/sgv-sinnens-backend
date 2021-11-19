<?php

namespace Database\Factories;

use App\Models\PermisoAutrisa;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermisoAutrisaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PermisoAutrisa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'placa' => $this->faker->unique()->bothify('???-###'),
            'fecha_emision' => '2021-01-01',
            'fecha_venc' => '2021-10-10'
        ];
    }
}
