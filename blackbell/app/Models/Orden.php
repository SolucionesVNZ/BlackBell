<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'orden';

    public function methodPay(){
        return $this->belongsTo('App\Models\MethodPay','fk_method_pay','id');
    }

    public function shoppingCart(){
        return $this->hasMany('App\Models\ShoppingCart','fk_orden','id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','fk_users','id');
    }
}
