<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['url'];

    public function article()
    {
        return $this->belongsTo('App\Article');
    }


}
