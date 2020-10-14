<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    protected $table = 'shopping_cart';

    protected $fillable = [
        'fk_usuario', 'fk_orden', 'subtotal',
    ];

    public function usuario(){
        return $this->belongsTo('App\Models\User','fk_usuario', 'id');
    }
    public function orden(){
        return $this->belongsTo('App\Models\Orden','fk_orden', 'id');
    }

    public function products(){
        return $this->belongsToMany('App\Models\Producto','product_shopping_cart','fk_shopping_cart','fk_producto');
    }

    public function productShoppingCart(){
        return $this->hasMany('App\Models\ProductShoppingCart','fk_shopping_cart','id');
    }
}
