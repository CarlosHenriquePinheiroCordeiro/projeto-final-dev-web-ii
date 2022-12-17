<?php

namespace Database\Factories;

use App\Models\Professor;
use App\Models\SalaVirtual;
use App\Models\SalaVirtualProfessor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SalaVirtualProfessor>
 */
class SalaVirtualProfessorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $salasVirtuais  = SalaVirtual::all()->pluck('id');
        $professores    = Professor::all()->pluck('pessoa_id');
        $pessoa_id        = $professores[rand(0, count($professores)-1)];
        $sala_virtual_id  = $salasVirtuais[rand(0, count($salasVirtuais)-1)];
        while (DB::table('sala_virtual_professors')->whereRaw(' pessoa_id = '.$pessoa_id.' and sala_virtual_id = '.$sala_virtual_id.' ')->exists()){
            $pessoa_id        = $professores[rand(0, count($professores)-1)];
            $sala_virtual_id  = $salasVirtuais[rand(0, count($salasVirtuais)-1)];
        }
        return [
            'sala_virtual_id'   => $sala_virtual_id,
            'pessoa_id'         => $pessoa_id,
            'ativo'             => rand(0, 1)
        ];
    }
}
