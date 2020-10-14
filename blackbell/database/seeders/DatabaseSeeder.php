<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DisciplinaSeeder::class,
            MembresiaSeeder::class,
            MethodPaySeeder::class,
            NivelSeeder::class,
            TipoDocumentoSeeder::class,
            ProductoSeeder::class,
            DepartamentoSeeder::class,
            ProvinciaSeeder::class,
            DistritoSeeder::class
        ]);
    }
}
