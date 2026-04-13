<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model{

    protected $fillable = [
        'user_id',
        'nombre', 
        'peso', 
        'categoria'
    ];

}

