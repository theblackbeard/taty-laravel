<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $fillable = ['title','name','active'];

    public function scopeArticle($query, $id)
    {
        $num = DB::table('articles')->where('category_id', $id);
        dd($num);
        return $this->belongsTo('App\Article')->withTimestamps();;
    }

    public function articles(){
        return $this->belongsToMany('App\Article');
    }
}
