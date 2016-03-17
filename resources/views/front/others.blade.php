@extends('layouts.home')
@section('title') @if(!isset($results)) Trabalhos com {{ str_replace("-", " ",$name)}}@else Todos os Outros Projetos @endif @endsection
@section('content')
    <section id="portfolio">
        @if(count($articles) > 0)
            <ul>
                <li><a href="/others" >Todos os Projetos</a></li>
                @if(isset($results))
                @foreach($results as $result)
                    <li class="menu_category"><a href="/others/{{str_replace(" ", "-", $result)}}">{{$result}}</a></li>
                @endforeach
                @endif
            </ul>
            <div class="row">
                @foreach($articles as $article)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 gallery a" >
                        <a href="/view/{{$article->name}}" class="thumbnail">
                            <img src="{{$article->cover}}" class="img-responseive effect"  />
                        </a>
                        <h3 class="ar_title">{{$article->title}}<span class="glyphicon glyphicon-eye-open pull-right icon_ar"> {{$article->views}}</span></h3>
                    </div>
                @endforeach

                @else
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-12" >
                        <h1>Sem artigos postados</h1>
                    </div>
                @endif
            </div>
    </section>
    <div class="bloco"></div>
    <div class="pags">{{ $articles->links() }}</div>

@endsection