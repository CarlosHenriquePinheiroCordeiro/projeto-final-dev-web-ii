<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aluno>
 */
class AlunoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $pessoasLivres = DB::table('pessoas')
        ->whereRaw(' NOT EXISTS (SELECT 1 FROM professors WHERE professors.pessoa_id = pessoas.id and pessoas.id > 1)
        AND NOT EXISTS (SELECT 1 FROM alunos WHERE alunos.pessoa_id = pessoas.id)')->pluck('id');
        return [
            'pessoa_id' => $pessoasLivres[rand(0, count($pessoasLivres)-1)]
        ];
    }
}
