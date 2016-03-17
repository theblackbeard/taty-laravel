@extends('layouts.admin')
@section('title', 'Nova Tag')
@section('content')
    <div id="a_category">
        {!! Form::open(array('url' => '/admin/tag')) !!}
        <div class="form-group">
            {{ Form::label('title', 'Titulo') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Salvar', ['class' => 'btn btn-primary form-control']) }}
        </div>

        {!! Form::close() !!}
    </div>

@endsection
