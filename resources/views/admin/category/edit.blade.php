@extends('layouts.admin')
@section('title', 'Editando Categoria')
@section('content')
    <div id="a_category">
        {!! Form::open(array('action' => array('CategoryController@update', $category->id, 'method' => 'put'))) !!}
        <div class="form-group">
            {{ Form::label('title', 'Titulo') }}
            {{ Form::text('title', $category->title, array('class' => 'form-control')) }}
        </div>
        <?php
        $selected = true;
        if($category->  active):
            $selected = true;
        else:
            $selected = false;
        endif;
        ?>
        <div class="form-group">
            {{ Form::label('active', 'Ativo') }}
            {{ Form::checkbox('active', '1', $selected, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Atualizar', ['class' => 'btn btn-primary form-control']) }}
        </div>

        {!! Form::close() !!}
    </div>

@endsection
