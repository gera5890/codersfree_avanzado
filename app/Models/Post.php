<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //relacion inversa uno a muchos
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
