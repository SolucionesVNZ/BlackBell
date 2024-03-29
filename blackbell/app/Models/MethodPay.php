<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MethodPay extends Model
{
    use HasFactory;

    protected $table = 'method_pay';

    public function orders(){
        return $this->hasMany('App\Models\Orden','fk_method_pay', 'id');
    }

}
