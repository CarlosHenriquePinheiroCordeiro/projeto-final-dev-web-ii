<?php

namespace Database\Factories;

use App\Models\Usuario;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pessoa>
 */
class PessoaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $usuariosLivres = DB::table('users')->whereRaw(' NOT EXISTS (SELECT 1 FROM pessoas WHERE pessoas.usuario_id = users.id)')->pluck('id');
        $usuarioId      = $usuariosLivres[rand(0, count($usuariosLivres)-1)];
        $faker = FakerFactory::create('pt_BR');
        $cpf = str_replace('.', '', $faker->cpf);
        $cpf = str_replace('-', '', $cpf);
        $rg  = str_replace('.', '', $faker->rg);
        $rg  = str_replace('-', '', $rg);
        return [
            'nome'              => $this->faker->words(2, true),
            'data_nascimento'   => $this->faker->date(),
            'cpf'               => $cpf,
            'rg'                => $rg,
            'usuario_id'        => $usuarioId
        ];
    }
}
