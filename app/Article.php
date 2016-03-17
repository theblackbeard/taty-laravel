<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Photo;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    protected $fillable = [
        'user_id',
        'menu_id',
        'category_id',
        'title',
        'name',
        'cover',
        'description',
        'status',
        'views'];



    public function owner()
    {
        return $this->belongsTo('App\User');
    }

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
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
        return $this->tags->lists('id')->all();
    }

    public function menuList($id){
        $data = $this->menu->where('id', $id)->first();
        return $data->id;
    }

    public function categoryList($id){
        $data = $this->category->where('id', $id)->first();
        return $data->id;
    }

    public function nameMenu($id){
        $data = $this->menu->where('id', $id)->first();
        return $data->title;
    }

    public function nameCategory($id){
        $data = $this->category->where('id', $id)->first();
        return $data->name;
    }

    public function titleCategory($id){
        $data = $this->category->where('id', $id)->first();
        return $data->title;
    }

    public function getPhoto($id){
        return $this->photos->lists('url')->all();

    }

    public function getPhotosArticleId($id){
        return $this->photos->where('article_id', $id)->all();

    }

    public function scopeLast($query){
        return $query->where('created_at', 'desc');
    }

    public function scopeActive($query){
        return $query->where('status', 1);
    }

    public function scopeOnlyThisMenu($query, $data){
        $menus = DB::table('menus')->where('name', '=', $data)->first();
        return $query->where('menu_id','=', $menus->id);
    }

    public static function scopeFindAllByString($query, $data)
    {
        $category = DB::table('categories')->where('name', '=', $data)->first();
        return $query->where('category_id', '=', $category->id);
    }

    public static function findByString($string)
    {
        return Article::where('name', $string)->first();
    }

    public static function listByString($string)
    {
        $tag = DB::table('tags')->where('name', '=', $string)->first();
         return Article::where('', $string);
    }

    public function addViews($id)
    {
        return Article::increment('views', 1, array('id' => $id));
    }
}
