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
        //KARATE BASICO
        DB::table('producto')->insert([
            'fk_disciplina' => 1,
            'fk_nivel' => 1,
            'fk_membresia' => 1,
            'precio' => 129.00,
            'descripcion' => '4 clases en vivo <br>Acceso al campus virtual',
        ]);
        DB::table('producto')->insert([
            'fk_disciplina' => 1,
            'fk_nivel' => 1,
            'fk_membresia' => 2,
            'precio' => 349.00,
            'descripcion' => '12 clases en vivo <br>Acceso al campus virtual<br>Evaluación de grado',
        ]);
        DB::table('producto')->insert([
            'fk_disciplina' => 1,
            'fk_nivel' => 1,
            'fk_membresia' => 3,
            'precio' => 699.00,
            'descripcion' => '24 clases en vivo <br>Acceso al campus virtual<br>Evaluación de grado',
        ]);

        //KARATE INTERMEDIO
        DB::table('producto')->insert([
            'fk_disciplina' => 1,
            'fk_nivel' => 2,
            'fk_membresia' => 1,
            'precio' => 149.00,
            'descripcion' => '4 clases en vivo <br>Acceso al campus virtual',
        ]);
        DB::table('producto')->insert([
            'fk_disciplina' => 1,
            'fk_nivel' => 2,
            'fk_membresia' => 2,
            'precio' => 369.00,
            'descripcion' => '12 clases en vivo <br>Acceso al campus virtual<br>Evaluación de grado',
        ]);
        DB::table('producto')->insert([
            'fk_disciplina' => 1,
            'fk_nivel' => 2,
            'fk_membresia' => 3,
            'precio' => 719.00,
            'descripcion' => '24 clases en vivo <br>Acceso al campus virtual<br>Evaluación de grado',
        ]);

        //KARATE AVANZADO
        DB::table('producto')->insert([
            'fk_disciplina' => 1,
            'fk_nivel' => 3,
            'fk_membresia' => 1,
            'precio' => 169.00,
            'descripcion' => '4 clases en vivo <br>Acceso al campus virtual',
        ]);
        DB::table('producto')->insert([
            'fk_disciplina' => 1,
            'fk_nivel' => 3,
            'fk_membresia' => 2,
            'precio' => 389.00,
            'descripcion' => '12 clases en vivo <br>Acceso al campus virtual<br>Evaluación de grado',
        ]);
        DB::table('producto')->insert([
            'fk_disciplina' => 1,
            'fk_nivel' => 3,
            'fk_membresia' => 3,
            'precio' => 739.00,
            'descripcion' => '24 clases en vivo <br>Acceso al campus virtual<br>Evaluación de grado',
        ]);

        //MUAY THAI

        //MUAY THAI BASICO
        DB::table('producto')->insert([
            'fk_disciplina' => 2,
            'fk_nivel' => 1,
            'fk_membresia' => 1,
            'precio' => 129.00,
            'descripcion' => '4 clases en vivo <br>Acceso al campus virtual',
        ]);
        DB::table('producto')->insert([
            'fk_disciplina' => 2,
            'fk_nivel' => 1,
            'fk_membresia' => 2,
            'precio' => 349.00,
            'descripcion' => '12 clases en vivo <br>Acceso al campus virtual<br>Evaluación de grado',
        ]);
        DB::table('producto')->insert([
            'fk_disciplina' => 2,
            'fk_nivel' => 1,
            'fk_membresia' => 3,
            'precio' => 699.00,
            'descripcion' => '24 clases en vivo <br>Acceso al campus virtual<br>Evaluación de grado',
        ]);

        //MUAY THAI INTERMEDIO
        DB::table('producto')->insert([
            'fk_disciplina' => 2,
            'fk_nivel' => 2,
            'fk_membresia' => 1,
            'precio' => 149.00,
            'descripcion' => '4 clases en vivo <br>Acceso al campus virtual',
        ]);
        DB::table('producto')->insert([
            'fk_disciplina' => 2,
            'fk_nivel' => 2,
            'fk_membresia' => 2,
            'precio' => 369.00,
            'descripcion' => '12 clases en vivo <br>Acceso al campus virtual<br>Evaluación de grado',
        ]);
        DB::table('producto')->insert([
            'fk_disciplina' => 2,
            'fk_nivel' => 2,
            'fk_membresia' => 3,
            'precio' => 719.00,
            'descripcion' => '24 clases en vivo <br>Acceso al campus virtual<br>Evaluación de grado',
        ]);

        //MUAY THAI AVANZADO
        DB::table('producto')->insert([
            'fk_disciplina' => 2,
            'fk_nivel' => 3,
            'fk_membresia' => 1,
            'precio' => 169.00,
            'descripcion' => '4 clases en vivo <br>Acceso al campus virtual',
        ]);
        DB::table('producto')->insert([
            'fk_disciplina' => 2,
            'fk_nivel' => 3,
            'fk_membresia' => 2,
            'precio' => 389.00,
            'descripcion' => '12 clases en vivo <br>Acceso al campus virtual<br>Evaluación de grado',
        ]);
        DB::table('producto')->insert([
            'fk_disciplina' => 2,
            'fk_nivel' => 3,
            'fk_membresia' => 3,
            'precio' => 739.00,
            'descripcion' => '24 clases en vivo <br>Acceso al campus virtual<br>Evaluación de grado',
        ]);

    }
}
