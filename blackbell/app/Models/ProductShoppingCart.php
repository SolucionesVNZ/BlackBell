<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductShoppingCart extends Model
{
    use HasFactory;

    protected $table = 'product_shopping_cart';

    public function product(){
        return $this->belongsTo('App\Models\Producto','fk_producto','id');
    }

    public function shoppingCart(){
        return $this->belongsTo('App\Models\ShoppingCart','fk_shopping_cart','id');
    }
}
