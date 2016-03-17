@extends('layouts.admin')
@section('title', 'Editando Menu')
@section('content')
    <div id="a_category">
        {!! Form::open(array('action' => array('TagController@update', $tag->id, 'method' => 'put'))) !!}
        <div class="form-group">
            {{ Form::label('title', 'Titulo') }}
            {{ Form::text('title', $tag->title, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Atualizar', ['class' => 'btn btn-primary form-control']) }}
        </div>


        {!! Form::close() !!}
    </div>

@endsection
