<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $tipoUsuario = rand(2, 3);
        return [
            'usuario'           => $this->faker->words(1, true),
            'senha'             => $this->faker->words(1, true),
            'ativo'             => 1,
            'termo'             => 1,
            'tipo_usuario_id'   => $tipoUsuario
        ];
    }
}
