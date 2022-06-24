<?php

namespace Database\Seeders;

use App\Models\evaluaciones;
use Illuminate\Database\Seeder;

class evaluacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        evaluaciones::factory(200)->create();
    }
}
