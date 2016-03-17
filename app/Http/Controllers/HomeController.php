<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'contact', 'send']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest('created_at')->Active()->get();
        return view('front.index', compact('articles'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function admin()
    {
        return view('admin.index');
    }

    public function send(Request $request)
    {
        $data = $request->all();

        Mail::raw('Text', function($message){
            $message->from('us@example.com', 'Mensagem do Site');
            $message->to('carvalho.ti.adm@gmail.com', 'Carlos');
        });
        return redirect('contact');
    }
}
