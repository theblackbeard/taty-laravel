<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\MenuRequest;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['category_portfolio', 'category_others']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.new');
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
        if(!isset($data['active'])):
            $data['active'] = '0';
        endif;
        $data['name'] = str_slug($data['title']);
        Category::create($data);
        flash()->success('Categoria Criada com Sucesso!');
        return redirect('admin/category');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin/category/edit', compact('category'));
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
        if(!isset($data['active'])):
            $data['active'] = '0';
        endif;
        $data['name'] = str_slug($data['title']);
        Category::find($id)->update($data);
        flash()->success('Categoria Atualizada com Sucesso!');
        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        flash()->success('Categoria Deletada com Sucesso!');
        return redirect('admin/category');
    }


    public function category_portfolio($name)
    {

       $articles = Article::Active()->FindAllByString($name)->OnlyThisMenu('principal')->paginate(30);
       return view('front.portfolio', compact('articles', 'name'));

    }


    public function category_others($name)
    {
        $articles = Article::Active()->FindAllByString($name)->OnlyThisMenu('outros')->paginate(30);
        return view('front.others', compact('articles', 'name'));
    }
}
