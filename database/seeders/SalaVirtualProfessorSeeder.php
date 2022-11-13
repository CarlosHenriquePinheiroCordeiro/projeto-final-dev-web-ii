<?php

namespace Database\Seeders;

use App\Models\SalaVirtualProfessor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalaVirtualProfessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SalaVirtualProfessor::factory(2)->create();
    }
}
