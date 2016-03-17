@extends('layouts.admin')
@section('title', 'Novo Menu')
@section('content')
    <div id="a_category">
        {!! Form::open(array('url' => '/admin/menu')) !!}
        <div class="form-group">
            {{ Form::label('title', 'Titulo') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('ativo', 'Ativo') }}
            {{ Form::checkbox('active', '1', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Salvar', ['class' => 'btn btn-primary form-control']) }}
        </div>

        {!! Form::close() !!}
    </div>

@endsection
