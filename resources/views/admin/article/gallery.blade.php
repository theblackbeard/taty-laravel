@extends('layouts.admin')
@section('title', 'Adicionar Fotos')
@section('content')
<div id="a_initial_box">
    {!! Form::open(array('action' => array('ArticleController@photos', $article->id, 'method' => 'put'), 'files' => true)) !!}
    <div class="form-group">
        {{ Form::label('photo', 'Foto(s)') }}
        {{ Form::file('url[]', ['multiple']) }}
    </div>
    <div class="form-group">
        {{ Form::submit('Adicionar', ['class' => 'btn btn-success form-control']) }}
    </div>

    {!! Form::close() !!}
    <hr>
    @if ($article->photos->count() > 0)

        @foreach ($article->photos as $photo)
        <div class="form-group">
              <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 gal">
                <img src="{{$photo->url}}" alt="" class="img-responsive thumbnail">

                <input type="hidden" name="_method" value="DELETE">
                <a href="{{$url = action('ArticleController@lessphoto', ['id' => $photo->id, 'articleId' => $article->id])}}" class="btn btn-danger form-control" ><span class="glyphicon glyphicon-remove icon"></span>Remover Imagem</a>
            </div>
        </div>
        @endforeach
        @else
        <h2>Sem Galeria</h2>
    @endif
    <div class="bloco"></div>
    <p><a href="{{$url = action('ArticleController@index')}}" class="btn btn-info">Voltar</a></p>
</div>
@endsection