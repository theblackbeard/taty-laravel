@extends('layouts.home')
@section('title') {{$tag->title}} @endsection
@section('content')
    <section id="portfolio">

            <div class="row">
                @foreach($tag->allArticlesbyTag as $article)
                     <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 gallery a" >
                        <a href="/view/{{$article->name}}" class="thumbnail">
                            <img src="{{$article->cover}}" class="img-responseive effect"  />
                        </a>
                        <h3 class="ar_title">{{$article->title}}<span class="glyphicon glyphicon-eye-open pull-right icon_ar"> {{$article->views}}</span></h3>
                    </div>
                @endforeach
   </div>
    </section>
    <div class="bloco"></div>
    <div class="pags">{{ $articles->links() }}</div>


@endsection



