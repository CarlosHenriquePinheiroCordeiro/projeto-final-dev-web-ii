<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\SalaVirtual;
use App\Models\SalaVirtualAluno;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

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
        $pessoa_id        = $alunos[rand(0, count($alunos)-1)];
        $sala_virtual_id  = $salasVirtuais[rand(0, count($salasVirtuais)-1)];
        while (DB::table('sala_virtual_alunos')->whereRaw(' pessoa_id = '.$pessoa_id.' and sala_virtual_id = '.$sala_virtual_id.' ')->exists()){
            $pessoa_id        = $alunos[rand(0, count($alunos)-1)];
            $sala_virtual_id  = $salasVirtuais[rand(0, count($salasVirtuais)-1)];
        }
        return [
            'sala_virtual_id'   => $sala_virtual_id,
            'pessoa_id'         => $pessoa_id,
            'situacao'          => rand(0, 1)
        ];
    }
}
