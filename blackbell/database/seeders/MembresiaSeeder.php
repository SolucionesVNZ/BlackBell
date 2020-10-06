<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembresiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('membresia')->insert([
            'descripcion' => 'Mensual'
        ]);
        DB::table('membresia')->insert([
            'descripcion' => 'Trimestral'
        ]);
        DB::table('membresia')->insert([
            'descripcion' => 'Semestral'
        ]);
    }
}
