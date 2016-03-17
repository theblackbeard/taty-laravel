@extends('layouts.home')
@section('title', 'Contato')
@section('content')
<section id="contact" class="col-xs-12 col-sm-6">
    <p>algum texto aqui</p>
</section>
<section id="form" data-wow-delay="1s" class="col-xs-12 col-sm-6 form">
    <div class="result">Resultado</div>
    {!! Form::open(array('url' => '/contact')) !!}
    <div class="form-group">
        {{ Form::label('name', 'Nome') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'E-Mail') }}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Descrição') }}
        {{ Form::textarea('description', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::submit('Enviar', ['class' => 'btn btn-defaul']) }}
    </div>
    {!! Form::close() !!}


</section>
<div class="bloco"></div>
@endsection