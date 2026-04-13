<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    // Permitimos que se llenen estos campos
    protected $fillable = [
        'user_id', 
        'recipe_id', 
        'title', 
        'image', 
        'notes'
    ];


}