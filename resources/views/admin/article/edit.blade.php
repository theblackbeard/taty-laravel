@extends('layouts.admin')
@section('title', 'Editando Artigo')
@section('content')
    <div id="content">
        <h1>Editando Artigo</h1>
        <h2>by Tatiana</h2>
    </div>
    <div id="a_messages">
        @include('admin.errors.errors')
    </div>

    <div id="a_category">
        {!! Form::open(array('action' => array('ArticleController@update', $article->id))) !!}
        <div class="form-group">
            {{ Form::label('photo', 'Foto(s)') }}
            {{ Form::file('photo[]',  array('multiple'=>true)) }}
        </div>
        <div class="form-group">
            {{ Form::label('menu', 'Menu') }}
            {{ Form::select('menu', array('L' => 'Large', 'S' => 'Small'), null, ['class' => 'form-control','placeholder' => 'Escolha o Menu...']) }}
        </div>
        <div class="form-group">
            {{ Form::label('category', 'Categoria') }}
            {{ Form::select('category', array('L' => 'Large', 'S' => 'Small'), null, ['class' => 'form-control','placeholder' => 'Escolha a Categoria...']) }}
        </div>
        <div class="form-group">
            {{ Form::label('title', 'Titulo') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('description', 'Descrição') }}
            {{ Form::textArea('description', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('tags', 'Tags') }}
            {{ Form::select('tags[]', $article->taglist(), null, ['class' => 'form-control','multiple'])}}
        </div>

        <div class="form-group">
            {{ Form::label('ativo', 'Ativo') }}
            {{ Form::checkbox('ativo', '1', false, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) }}
        </div>

        {!! Form::close() !!}
    </div>

@endsection
