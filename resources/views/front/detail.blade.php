@extends('layouts.home')
@section('title'){{$article->title}} @endsection
@section('content')
    <section id="detail">
        <div class="col-xs-12 cover">
            <img src="{{$article->cover}}" class="img-responsive shadow-border">
            <p>
                <blockquote>{{$article->description}}</blockquote>
            </p>
        </div>
        <div class="separator"></div>
        @if(count($article->photos)>0)
            <div class="col-xs-12 photos">
                <h1 class="esquerda">Fotos do Projeto</h1>
                @foreach($article->photos as $photo)
                    <div class="col-xs-6 col-lg-4 gallery popup-gallery" data-wow-delay="0.9s">
                        <a href="{{$photo->url}}" title="Fotos de {{$article->title}}">
                            <img src="{{$photo->url}}" data-scale="best-fit-down" data-align="center" class="thumbnail img-responsive" >
                        </a>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="bloco"></div>
        <div class="col-xs-12 fundo tagsrel" >
            <h1>Tags Relacionadas</h1>

            <p><span class="glyphicon glyphicon-tags icon" title="Tags da Postagem"></span>
                @foreach($article->tags as $tag )
                <a href="/tag/{{$tag->name}}" class="tag" data-wow-delay="1s">{{$tag->title}}</a>
                @endforeach
            </p>

        </div>

        <div class="bloco"></div>
        <div class="data">Postado em: {{ $article->created_at->format('d-m-Y')  }}</div>
    </section>


@endsection