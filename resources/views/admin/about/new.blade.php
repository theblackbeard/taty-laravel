@extends('layouts.admin')
@section('title', 'Nova Categoria')
@section('content')
    <div id="content">
        <h1>Novo Perfil</h1>
        <h2>by Tatiana</h2>
    </div>
    <div id="a_messages">
        @include('admin.errors.errors')
    </div>
    <div id="a_category">
        {!! Form::open(array('url' => '/admin/about')) !!}
        <div class="form-group">
            {{ Form::label('description', 'Descrição') }}
            {{ Form::textarea('description', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Salvar', ['class' => 'btn btn-primary form-control']) }}
        </div>

        {!! Form::close() !!}
    </div>

@endsection