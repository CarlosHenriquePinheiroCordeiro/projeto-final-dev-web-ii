<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\SalaVirtual;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SalaVirtualAluno>
 */
class SalaVirtualAlunoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $salasVirtuais  = SalaVirtual::all()->pluck('id');
        $alunos         = Aluno::all()->pluck('pessoa_id');
        return [
            'sala_virtual_id'   => $salasVirtuais[rand(0, count($salasVirtuais)-1)],
            'pessoa_id'         => $alunos[rand(0, count($alunos)-1)]
        ];
    }
}
