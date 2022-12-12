<?php

namespace Database\Seeders;

use App\Models\Comunidad;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComunidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comunidad::factory(10)->has(User::factory(4))->create();
    }
}
