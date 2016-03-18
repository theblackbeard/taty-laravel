<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\MenuRequest;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['tag', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
       $data = $request->all();
       $data['name'] = str_slug($data['title']);
       Tag::create($data);
       flash()->success('Tag Criada com Sucesso!');
       return redirect('admin/tag');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {

        $tag = Tag::getCatbyName($name)->get()->first();
        $articles = Article::Active()->paginate(30);
        if(is_null($tag)):
            abort(404);
        endif;
        return view('front.tag', compact('articles', 'tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $tag = Tag::find($id);
       return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, $id)
    {
        $data = $request->all();
        $data['name'] = str_slug($data['title']);
        Tag::find($id)->update($data);
        flash()->success('Tag Atualizada com Sucesso!');
        return redirect('admin/tag');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::find($id)->delete();
        flash()->success('Tag Deletada com Sucesso!');
        return redirect('admin/tag');
    }
}
