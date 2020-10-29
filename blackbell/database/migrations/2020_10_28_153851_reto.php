<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 200);
            $table->string('apellido', 200);
            $table->string('telefono', 13);
            $table->string('email',255);
            //$table->string('email')->unique();
            $table->string('entrada', 100);
            $table->string('horario', 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reto');
    }
}
