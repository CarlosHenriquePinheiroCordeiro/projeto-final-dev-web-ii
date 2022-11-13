<?php

namespace Database\Factories;

use App\Models\SalaVirtual;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegistroAula>
 */
class RegistroAulaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $salasVirtuais = SalaVirtual::all()->pluck('id');
        $salaVirtual = $salasVirtuais[rand(0, count($salasVirtuais)-1)];
        return [
            'descricao'         => $this->faker->words(10, true),
            'data'              => $this->faker->date(),
            'qtd_aula'          => rand(0, 10),
            'sala_virtual_id'   => $salaVirtual
        ];
    }
}
