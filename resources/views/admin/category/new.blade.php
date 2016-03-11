@extends('layouts.admin')
@section('title', 'Nova Categoria')
@section('content')
    <div id="content">
        <h1>Nova Categoria</h1>
        <h2>by Tatiana</h2>
    </div>
    <div id="a_messages">
        @include('admin.errors.errors')
    </div>

    <div id="a_category">
        {!! Form::open(array('url' => '/admin/category')) !!}
        <div class="form-group">
            {{ Form::label('title', 'Titulo') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('active', 'Ativo') }}
            {{ Form::checkbox('active', '1', true, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Salvar', ['class' => 'btn btn-primary form-control']) }}
        </div>

        {!! Form::close() !!}
    </div>

@endsection
