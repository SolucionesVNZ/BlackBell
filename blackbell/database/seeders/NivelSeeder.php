<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nivel')->insert([
            'descripcion' => 'Basico'
        ]);
        DB::table('nivel')->insert([
            'descripcion' => 'Intermedio'
        ]);
        DB::table('nivel')->insert([
            'descripcion' => 'Avanzado'
        ]);
    }
}
