<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;
    protected $table = 'disciplina';

    public function productos(){
        return $this->hasMany('App\Models\Producto','fk_disciplina', 'id');
    }
}
