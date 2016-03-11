<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Filesystem\Filesystem;
use App\Menu;
use App\Category;
use App\Photo;
use App\User;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.article.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$user = Auth::user();
        dd($user['id']);*/
        $menus = Menu::lists('title', 'id');
        $categories = Category::lists('title', 'id');
        $tags = Tag::lists('title', 'id');
        return view('admin.article.new', compact('menus', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        $data = $request->all();
        $data['name'] = str_slug($data['title']);
        $data['status'] = '0';
        $data['views'] = 0;
        $data['user_id'] = $user['id'];

        $photos = Input::file('url');
        $photosDB =  $this->upload_photos($photos);
        $article = Article::create($data);
        $article->tags()->attach($request->input('tags'));
        return redirect('admin/article');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $tags = Tag::lists('title', 'id');
        return view('admin.article.edit', compact('article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function upload_photos(array $photos){
        $photos_count = count($photos);
        $filenames = array();
        foreach($photos as $photo ):
            $file_info = pathinfo($photo->getClientOriginalName());
            $file_info['filename'] = str_random(40);
            $filename = str_slug($file_info['filename'])  . "." . $file_info['extension'];
            array_push($filenames, $filename);
            $destinationPath = 'uploads';
            $file_upload = $photo->move($destinationPath, $filename);
        endforeach;
       return this->$this->saveOnDB($filenames);
    }

    private function saveOnDB(array $data, $id){
        if(count($data) == 0): return false;
        else:
            $article = Article::find($id);
            $p = [];
            $photo = array_pop($data);
            $p = array_add($p, 'url', $photo);
            $db = new Photo;
            $db->url = $photo;
            $article->photos()->save($db);
            $this->saveOnDB($data);
        endif;
    }
}
