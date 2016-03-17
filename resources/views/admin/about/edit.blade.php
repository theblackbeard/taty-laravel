@extends('layouts.admin')
@section('title', 'Editando Perfil')
@section('content')
    <div id="content">
        <h1>Editando Perfil</h1>
        <h2>by Tatiana</h2>
    </div>
    <div id="a_messages">
        @include('admin.errors.errors')
    </div>

    <div id="a_category">
        {!! Form::open(array('action' => array('AboutController@update', $about->id, 'method' => 'put'))) !!}
        <div class="form-group">
            {{ Form::label('description', 'Descrição') }}
            {{ Form::textarea('description', $about->description, array('class' => 'form-control')) }}
        </div>


        <div class="form-group">
            {{ Form::submit('Atualizar', ['class' => 'btn btn-primary form-control']) }}
        </div>

        {!! Form::close() !!}
    </div>

@endsection
