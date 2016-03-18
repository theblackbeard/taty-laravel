@extends('layouts.admin')
@section('title', 'Novo Artigo')
@section('content')
       <div id="a_category">
        {!! Form::open(array('url' => '/admin/article', 'files' => true)) !!}
        <div class="form-group">
            {{ Form::label('photo', 'Foto(s)') }}
            {{ Form::file('cover') }}
        </div>
        <div class="form-group">
            {{ Form::label('menu', 'Menu') }}
            {{ Form::select('menu_id', $menus, null, ['id' => 'menu_id','class' => 'form-control','placeholder' => 'Escolha o Menu...']) }}
        </div>
        <div class="form-group">
            {{ Form::label('category', 'Categoria') }}
            {{ Form::select('category_id', $categories, null, ['id'=> 'category_id', 'class' => 'form-control','placeholder' => 'Escolha a Categoria...']) }}
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
            {{ Form::select('tags[]', $tags, null, ['id' => 'tags', 'class' => 'form-control','multiple'])}}
        </div>


        <div class="form-group">
            {{ Form::submit('Salvar', ['class' => 'btn btn-primary form-control']) }}
        </div>

        {!! Form::close() !!}
    </div>

@endsection

@section('footer')
    <script>
        $('#tags').select2({
            placeholder: 'Escolha Uma ou Mais Tags',
            tags: true

        });
        $('#menu_id').select2({
            placeholder: 'Escolha Um Menu',
            tags: true

        });
        $('#category_id').select2({
            placeholder: 'Escolha uma Categoria',
            tags: true

        });
    </script>
@endsection