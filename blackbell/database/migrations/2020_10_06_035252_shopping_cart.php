<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShoppingCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_usuario')->nullable()->default(null);
            $table->unsignedBigInteger('fk_orden')->nullable()->default(null);

            $table->double('subtotal',5,2)->nullable()->default(null);
            $table->timestamps();
            $table->foreign('fk_usuario')->references('id')->on('users');
            //$table->foreign('fk_orden')->references('id')->on('orden');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_cart');
    }
}
