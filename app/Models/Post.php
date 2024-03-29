<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable =[
        'id',
        'title',
        'slug',
        'body',
        'category_id'
    ];

    public function getRouteKeyName()
    {
        return "slug";   
    }

    //relacion inversa uno a muchos
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //relacion muchos a muchos
    // public function tags(){
    //     return $this->belongsToMany(Tag::class)->withTimestamps()->withPivot('data');
    // }

    //relacion uno a uno morph

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    //relacion uno a muchos polimorfica

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }


    //relacion muchos a muchos polimorfica
    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
