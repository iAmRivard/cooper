<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Crm_socios>
 */
class CrmSociosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombres' => $this->faker->name(),
            'apellidos' => $this->faker->name(),
            'dui' => $this->faker->regexify('[0-9]{9}'),
            'nit' => $this->faker->regexify('[0-9]{13}'),
            'direccion' => $this->faker->address(),
            'correo' => $this->faker->safeEmail(),
            'salario' => $this->faker->randomFloat(2),
            'estado' => 1,
        ];
    }
}
