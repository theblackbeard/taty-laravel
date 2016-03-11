@extends('layouts.admin')
@section('title', 'Novo Artigo')
@section('content')
    <div id="content">
        <h1>Novo Artigo</h1>
        <h2>by Tatiana</h2>
    </div>
    <div id="a_messages">
        @include('admin.errors.errors')
    </div>

    <div id="a_category">
        {!! Form::open(array('url' => '/admin/article', 'class' => 'form', 'files' => true)) !!}
        <div class="form-group">
            {{ Form::label('photo', 'Foto(s)') }}
            {{ Form::file('url[]',  array('multiple'=>true)) }}
        </div>
        <div class="form-group">
            {{ Form::label('menu', 'Menu') }}
            {{ Form::select('menu_id', $menus, null, ['class' => 'form-control','placeholder' => 'Escolha o Menu...']) }}
        </div>
        <div class="form-group">
            {{ Form::label('category', 'Categoria') }}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control','placeholder' => 'Escolha a Categoria...']) }}
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
            {{ Form::select('tags[]', $tags, null, ['class' => 'form-control','multiple'])}}
        </div>


        <div class="form-group">
            {{ Form::submit('Salvar', ['class' => 'btn btn-primary form-control']) }}
        </div>

        {!! Form::close() !!}
    </div>

@endsection
