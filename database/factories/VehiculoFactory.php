<?php

namespace Database\Factories;

use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehiculoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehiculo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'placa' => $this->faker->unique()->bothify('???-###'),
            'usuario' => $this->faker->randomElement(['SINNENS', 'CERRO VERDE']),
            'unidad' => $this->faker->randomElement(['Camioneta Pick Up', 'Combi', 'Camion Volquete']),
            'anho' => $this->faker->numberBetween(1990, 2020),
            'tipo' => $this->faker->randomElement(['N1', 'N2', 'N3', 'M1', 'M2', 'M3']),
        ];
    }
}
