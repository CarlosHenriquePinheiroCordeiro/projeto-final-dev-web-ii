<?php

namespace Database\Factories;

use App\Models\Disciplina;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SalaVirtual>
 */
class SalaVirtualFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $disciplinas = Disciplina::all()->pluck('id');
        $disciplina = $disciplinas[rand(0, count($disciplinas)-1)];
        return [
            'nome'          => $this->faker->words(4, true),
            'descricao'     => $this->faker->words(10, true),
            'disciplina_id' => $disciplina
        ];
    }
}
