<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->unsignedBigInteger('fk_tipo_documento');
            $table->string('document');
            $table->unsignedBigInteger('fk_departamento');
            $table->unsignedBigInteger('fk_provincia');
            $table->unsignedBigInteger('fk_distrito');
            $table->string('phone');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('fk_tipo_documento')->references('id')->on('tipo_documento');
            $table->foreign('fk_departamento')->references('id')->on('departamento');
            $table->foreign('fk_provincia')->references('id')->on('provincia');
            $table->foreign('fk_distrito')->references('id')->on('distrito');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
