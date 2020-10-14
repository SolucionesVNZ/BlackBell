<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Producto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_disciplina');
            $table->unsignedBigInteger('fk_nivel');
            $table->unsignedBigInteger('fk_membresia');
            $table->double('precio', 5,2);
            $table->string('descripcion', 200);
            $table->timestamps();
            $table->foreign('fk_disciplina')->references('id')->on('disciplina');
            $table->foreign('fk_nivel')->references('id')->on('nivel');
            $table->foreign('fk_membresia')->references('id')->on('membresia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
