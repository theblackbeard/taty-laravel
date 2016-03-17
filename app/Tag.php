<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['title', 'name'];

    public function allArticlesbyTag(){
        return $this->belongsToMany('App\Article')->withTimestamps();
    }

    public static function getCatbyName($string){
        return Tag::where('name',$string);
    }

}
