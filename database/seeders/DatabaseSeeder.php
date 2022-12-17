<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EstadoSeeder::class,
            CidadeSeeder::class,
            UserSeeder::class,
            PessoaSeeder::class,
            EnderecoSeeder::class,
            AlunoSeeder::class,
            ProfessorSeeder::class,
            DisciplinaSeeder::class,
            SalaVirtualSeeder::class,
            SalaVirtualAlunoSeeder::class,
            SalaVirtualProfessorSeeder::class,
            RegistroAulaSeeder::class
        ]);
    }
}
