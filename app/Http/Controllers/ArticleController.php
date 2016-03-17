<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ArticleUpdateRequest;
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
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['home', 'portfolio', 'outros', 'article', 'detail']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.article.index', compact('articles'));
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
    public function store(ArticleRequest $request)
    {


        $user = Auth::user();
        $photos = Input::file('cover');
        $data = $request->all();
        $data['name'] = str_slug($data['title']);
        $data['status'] = '0';
        $data['views'] = 0;
        $data['user_id'] = $user['id'];
        $photosDB =  $this->upload_photo($photos);
        $data['cover'] = (string)$photosDB;
        $article = Article::create($data);
        $article->tags()->sync($request->input('tags'));
        flash()->success('Artigo Criado com Sucesso!');
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
    public function edit($id)
    {
        $menus = Menu::lists('title', 'id');
        $categories = Category::lists('title', 'id');
        $tags = Tag::lists('title', 'id');
        $article = Article::find($id);
        return view('admin.article.edit', compact('article', 'menus', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleUpdateRequest $request, $id)
    {
        $article = Article::find($id);
        $user = Auth::user();
        $photos = Input::file('cover');
        $data = $request->all();
        $status = ($article->status == 1)
            ? $data['status'] = 1  : $data['status'] = 0;
        $data['status'] = $status;
        $data['name'] = str_slug($data['title']);
        $data['user_id'] = $user['id'];

        if(!is_null($photos)){
            $path = public_path();
            unlink($path .'/' .$article->cover);
            $photosDB =  $this->upload_photo($photos);
            $data['cover'] = (string)$photosDB;
        }
        $article->update($data);
        $article->tags()->sync($request->input('tags'));
        flash()->success('Artigo Atualizado com Sucesso!');
        return redirect('admin/article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $path = public_path() .DIRECTORY_SEPARATOR . $article->cover;
        $photos = $article->getPhoto($article->id);
        if(!empty($photos)):
            $allPhotos = array_merge($photos, [$article->cover]);
            $this->remove_files($allPhotos);
            $photosDel = $article->getPhotosArticleId($article->id);
            foreach($photosDel as $p){
                $p->delete();
            }
        else:
            $allPhotos = array_merge([$article->cover]);
            $this->remove_files($allPhotos);
        endif;

        $article->delete();
        flash()->success('Artigo Deletado com Sucesso!');
        return redirect('admin/article/');
    }

    public function gallery($id)
    {
        $article = Article::find($id);

        return view('admin.article.gallery', compact('article'));
    }

    public function photos($id)
    {
        $photos = Input::file('url');
        $photosDB = $this->upload_photos($photos);
        $this->saveOnDB($photosDB, $id);
        return redirect('admin/article/'.$id.'/gallery');
    }

    public function lessphoto($id, $articleId)
    {
        $photo = Photo::find($id);
        $path = public_path() .DIRECTORY_SEPARATOR. 'uploads' .DIRECTORY_SEPARATOR . $photo->url;
        if(file_exists($path)):
            unlink($path);
        endif;
        $photo->delete();
        return redirect('admin/article/'.$articleId.'/gallery');

    }

    public function status($id, $data)
    {

        $active = ['status' => $data];
        Article::find($id)->update($active);
        return redirect('admin/article');
    }


    private function upload_photo($photo){
      $file_info = pathinfo($photo->getClientOriginalName());
      $file_info['filename'] = str_random(40);  
      $filename = str_slug($file_info['filename'])  . "." . $file_info['extension'];
      $destinationPath = 'uploads';
      $file_upload = $photo->move($destinationPath, $filename);
      return DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $filename;
    }

    private function upload_photos($photos){
        $photos_count = count($photos);
        $filenames = array();
        foreach($photos as $photo):
            $file_info = pathinfo($photo->getClientOriginalName());
            $file_info['filename'] = str_random(40);
            $filename = str_slug($file_info['filename'])  . "." . $file_info['extension'];
            array_push($filenames, $filename);
            $destinationPath = 'uploads';
            $file_upload = $photo->move($destinationPath, $filename);
        endforeach;
       return $filenames;
    }
    private function remove_files($urls){
        $url = array_pop($urls);
        $path = public_path() . $url;
        if(file_exists($path)):
           chown($path,0777);
           unlink($path);
           $this->remove_files($urls);
        endif;
    }
    private function saveOnDB(array $data, $id){
        if(count($data) == 0): return false;
        else:
            $article = Article::find($id);
            $p = [];
            $photo = array_pop($data);
            $p = array_add($p, 'url', $photo);
            $db = new Photo;
            $db->url = DIRECTORY_SEPARATOR . 'uploads' .DIRECTORY_SEPARATOR. $photo;
            $article->photos()->save($db);
            $this->saveOnDB($data, $id);
        endif;
    }

    //front
    public function home(){
        $articles = Article::Active()->OnlyThisMenu('principal')->get();
        return view('front.index', compact('articles'));
    }

    public function portfolio(){
        $articles = Article::Active()->OnlyThisMenu('principal')->paginate(30);
        $results =  $this->getNameCategory($articles);
        return view('front.portfolio', compact('articles', 'results'));
    }

    public function outros(){
        $articles = Article::Active()->OnlyThisMenu('outros')->paginate(30);
        $results =  $this->getNameCategory($articles);
        return view('front.others', compact('articles', 'results'));
    }

    public function detail($name){
        $article = Article::findByString($name);
        $article->addViews($article->id);
        return view('front.detail', compact('article'));
    }

    public function tag_list($name){
        $articles = Article::listByString($name)->Active()->get();
        dd($articles);

        return view('front.tags', compact('articles'));
    }


    private function getNameCategory($datas)
    {
        $cat = [];
        foreach($datas as $data):
            array_push($cat,
                str_replace("-", " ",$data->namecategory($data->category_id))
            );
        endforeach;
        return  array_unique($cat);
    }
}
