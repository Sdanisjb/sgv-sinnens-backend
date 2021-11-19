<?php

namespace Database\Factories;

use App\Models\Admin_Logistica;
use Illuminate\Database\Eloquent\Factories\Factory;

class Admin_LogisticaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin_Logistica::class;

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
