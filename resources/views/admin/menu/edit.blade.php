@extends('layouts.admin')
@section('title', 'Editando Menu')
@section('content')
    <div id="content">
        <h1>Editando Menu</h1>
        <h2>by Tatiana</h2>
    </div>
    <div id="a_messages">
        @include('admin.errors.errors')
    </div>

    <div id="a_category">
        {!! Form::open(array('action' => array('MenuController@update', $menu->id, 'method' => 'put'))) !!}
        <div class="form-group">
            {{ Form::label('title', 'Titulo') }}
            {{ Form::text('title', $menu->title, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            <?php
                $selected = true;
                if($menu->  active):
                    $selected = true;
                else:
                    $selected = false;
                endif;
            ?>
            {{ Form::label('ativo', 'Ativo') }}
            {{ Form::checkbox('active', '1', $selected, ['class' => 'form-control'] ) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Atualizar', ['class' => 'btn btn-primary form-control']) }}
        </div>


        {!! Form::close() !!}
    </div>

@endsection
