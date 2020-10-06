<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //KARATE
        DB::table('producto')->insert([
            'fk_disciplina' => 1,
            'fk_membresia' => 1,
            'precio' => 129.00,
            'descripcion' => 'Karate Basico - Mensual',
        ]);
        DB::table('producto')->insert([
            'fk_disciplina' => 1,
            'fk_membresia' => 2,
            'precio' => 349.00,
            'descripcion' => 'Karate Intermedio - Trimestral',
        ]);
        DB::table('producto')->insert([
            'fk_disciplina' => 1,
            'fk_membresia' => 3,
            'precio' => 699.00,
            'descripcion' => 'Karate Avanzado - Semestral',
        ]);

        //MUAY THAI

    }
}
