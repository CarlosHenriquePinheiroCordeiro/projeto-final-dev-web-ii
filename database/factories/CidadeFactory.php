<?php

namespace Database\Factories;

use App\Models\Estado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cidade>
 */
class CidadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $estados   = Estado::all(['id']);
        $estado_id = $estados[rand(0, count($estados) - 1)];
        return [
            'nome'      => $this->faker->words(4, true),
            'estado_id' => $estado_id
        ];
    }
}
