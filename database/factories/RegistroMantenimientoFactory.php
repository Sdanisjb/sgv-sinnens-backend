<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RegistroMantenimientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'placa_vehiculo' => $this->faker->bothify('???-###'),
            'fecha_emision' => $this->faker->dateTimeBetween('-3 weeks', 'now'),
            'fecha_salida' => $this->faker->dateTimeBetween('now', '+1 month'),
            'nombre_taller' => $this->faker->realText(20),
            'km_actual' => $this->faker->optional()->randomNumber(),
            'nro_factura' => $this->faker->numerify('##########'),
            'nro_proforma' => $this->faker->optional()->numerify('##########')
        ];
    }
}
