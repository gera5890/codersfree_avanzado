<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    //Relacion uno a muchos

    public function lessons(){
        return $this->hasMany(Lesson::class);
    }

    //Relacion inversa
    public function course(){
        return $this->belongsToMany(Course::class);
    }
}
