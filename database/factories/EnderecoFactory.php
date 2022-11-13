<?php

namespace Database\Factories;

use App\Models\Cidade;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $pessoasLivres = DB::table('pessoas')
        ->whereRaw(' NOT EXISTS (SELECT 1 FROM enderecos WHERE enderecos.pessoa_id = pessoas.id and pessoas.id > 1)')->pluck('id');
        $cidades = Cidade::all()->pluck('id');
        return [
            'pessoa_id' => $pessoasLivres[rand(0, count($pessoasLivres)-1)],
            'rua'       => $this->faker->words(5, true),
            'bairro'    => $this->faker->words(3, true),
            'numero'    => rand(0, 1000),
            'cidade_id' => $cidades[rand(0, count($cidades)-1)]
        ];
    }
}
