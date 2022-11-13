<?php

namespace Database\Seeders;

use App\Models\SalaVirtual;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalaVirtualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SalaVirtual::factory(10)->create();
    }
}
