<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisciplinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disciplina')->insert([
            'descripcion' => 'Karate'
        ]);
        DB::table('disciplina')->insert([
            'descripcion' => 'Muay Thai'
        ]);
        DB::table('disciplina')->insert([
            'descripcion' => 'Taekwondo'
        ]);
    }
}
