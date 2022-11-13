<?php

namespace Database\Seeders;

use App\Models\SalaVirtualAluno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalaVirtualAlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SalaVirtualAluno::factory(2)->create();
    }
}
