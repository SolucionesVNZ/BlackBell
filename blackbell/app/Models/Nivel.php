<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;
    protected $table = 'nivel';

    public function productos(){
        return $this->hasMany('App\Models\Producto','fk_nivel', 'id');
    }
}
