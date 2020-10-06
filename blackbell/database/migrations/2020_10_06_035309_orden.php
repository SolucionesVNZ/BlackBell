<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_shopping_cart');
            $table->unsignedBigInteger('fk_method_pay');
            $table->unsignedBigInteger('fk_users');
            $table->double('total', 5,2);
            $table->timestamps();
            $table->foreign('fk_shopping_cart')->references('id')->on('shopping_cart');
            $table->foreign('fk_method_pay')->references('id')->on('method_pay');
            $table->foreign('fk_users')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden');
    }
}
