<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('membresia')->insert([
            'descripcion' => 'DNI'
        ]);

        DB::table('membresia')->insert([
            'descripcion' => 'Carnet de extrangeria'
        ]);

        DB::table('membresia')->insert([
            'descripcion' => 'Pasaporte'
        ]);
    }
}
