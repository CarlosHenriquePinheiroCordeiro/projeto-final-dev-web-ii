<?php

namespace Database\Factories;

use App\Models\Professor;
use App\Models\SalaVirtual;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'sala_virtual_id'   => $salasVirtuais[rand(0, count($salasVirtuais)-1)],
            'pessoa_id'         => $professores[rand(0, count($professores)-1)]
        ];
    }
}
