<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Photo;

class Article extends Model
{
    protected $fillable = [
        'user_id',
        'menu_id',
        'category_id',
        'title',
        'name',
        'description',
        'status',
        'views'];

    public function owner()
    {
        return $this->belongsTo('App\User');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public function getTagListAttribute(){
        return $this->tags->list('id');
    }
}
