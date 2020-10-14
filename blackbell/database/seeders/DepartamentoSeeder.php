<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamento')->insert([
            ['nomDepa' => 'AMAZONAS'],
            ['nomDepa' => 'ANCASH' ],
            ['nomDepa' => 'APURIMAC' ],
            ['nomDepa' => 'AREQUIPA' ],
            ['nomDepa' => 'AYACUCHO' ],
            ['nomDepa' => 'CAJAMARCA' ],
            ['nomDepa' => 'CALLAO' ],
            ['nomDepa' => 'CUSCO' ],
            ['nomDepa' => 'HUANCAVELICA' ],
            ['nomDepa' => 'HUANUCO' ],
            ['nomDepa' => 'ICA' ],
            ['nomDepa' => 'JUNIN' ],
            ['nomDepa' => 'LA LIBERTAD' ],
            ['nomDepa' => 'LAMBAYEQUE' ],
            ['nomDepa' => 'LIMA' ],
            ['nomDepa' => 'LORETO' ],
            ['nomDepa' => 'MADRE DE DIOS' ],
            ['nomDepa' => 'MOQUEGUA' ],
            ['nomDepa' => 'PASCO' ],
            ['nomDepa' => 'PIURA' ],
            ['nomDepa' => 'PUNO' ],
            ['nomDepa' => 'SAN MARTIN' ],
            ['nomDepa' => 'TACNA' ],
            ['nomDepa' => 'TUMBES' ],
            ['nomDepa' => 'UCAYALI']
        ]);
    }
}
