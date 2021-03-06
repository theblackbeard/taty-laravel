<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['title','name','active'];

    public function articles(){
        return $this->belongsTo('App\Article');
    }
}
