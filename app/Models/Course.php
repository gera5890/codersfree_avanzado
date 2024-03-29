<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    //Relacion uno a muchos
    public function sections(){
        return $this->hasMany(Section::class);
    }

    //relacion uno a muchos through
    public function lessons(){
        return $this->hasManyThrough(Lesson::class, Section::class);
    }

    //relacion muchos a mucho polimorfica

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
