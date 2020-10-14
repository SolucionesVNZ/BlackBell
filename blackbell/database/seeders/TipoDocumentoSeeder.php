<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_documento')->insert([
            'descripcion' => 'DNI'
        ]);

        DB::table('tipo_documento')->insert([
            'descripcion' => 'Carnet de extrangeria'
        ]);

        DB::table('tipo_documento')->insert([
            'descripcion' => 'Pasaporte'
        ]);
    }
}
