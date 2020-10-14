<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';

    public function disciplina(){
        return $this->belongsTo('App\Models\Disciplina','fk_disciplina', 'id');
    }

    public function membresia(){
        return $this->belongsTo('App\Models\Membresia','fk_membresia', 'id');
    }

    public function shoppingCarts(){
        return $this->belongsToMany('App\Models\ShoppingCart','product_shopping_cart','fk_producto','fk_shopping_cart');
    }

    public function productShoppingCart(){
        return $this->hasMany('App\Models\Producto','fk_producto', 'id');
    }
}
