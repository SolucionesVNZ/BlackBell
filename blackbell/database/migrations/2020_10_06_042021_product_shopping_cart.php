<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductShoppingCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_shopping_cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_shopping_cart');
            $table->unsignedBigInteger('fk_producto');
            $table->integer('cantidad');
            $table->double('precio_unit', 7,2)->nullable()->default(null);
            $table->double('total', 7,2)->nullable()->default(null);
            $table->timestamps();
            $table->foreign('fk_shopping_cart')->references('id')->on('shopping_cart');
            $table->foreign('fk_producto')->references('id')->on('producto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_shopping_cart');

    }
}
