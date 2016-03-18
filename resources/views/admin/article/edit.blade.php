@extends('layouts.admin')
@section('title', 'Editando Artigo')
@section('content')
    <div id="a_category">
        {!! Form::open(array('action' => array('ArticleController@update', $article->id, 'method' => 'put'),'files' => true)) !!}
        <div class="form-group">
            {{ Form::label('photo', 'Foto(s)') }}
            {{ Form::file('cover') }}
        </div>
        <div class="form-group">

            {{ Form::label('menu', 'Menu') }}
            {{ Form::select('menu_id', $menus, $article->menuList($article->menu_id), ['id'=> 'menu_id','class' => 'form-control','placeholder' => 'Escolha o Menu...']) }}
        </div>

        <div class="form-group">
            {{ Form::label('category', 'Categoria') }}
            {{ Form::select('category_id', $categories, $article->categoryList($article->category_id), ['id'=> 'category_id','class' => 'form-control','placeholder' => 'Escolha a Categoria...']) }}
        </div>

        <div class="form-group">
            {{ Form::label('title', 'Titulo') }}
            {{ Form::text('title', $article->title, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Descrição') }}
            {{ Form::textArea('description', $article->description, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('tags', 'Tags') }}
            {{ Form::select('tags[]', $tags, $article->tag_list, ['id' => 'tags','class' => 'form-control','multiple'])}}
        </div>

        <div class="form-group">
            {{ Form::submit('Atualizar', ['class' => 'btn btn-primary form-control']) }}
        </div>

        {!! Form::close() !!}
    </div>

@endsection
@section('footer')
    <script>
        $('#tags').select2({
            placeholder: 'Escolha Uma ou Mais Tags',
            tags: true

        });
        $('#menu_id').select2({
            placeholder: 'Escolha Um Menu',
            tags: true

        });
        $('#category_id').select2({
            placeholder: 'Escolha uma Categoria',
            tags: true

        });
    </script>
@endsection