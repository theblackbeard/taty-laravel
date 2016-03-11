<div class="form-group">
    {{ Form::label('photo', 'Foto(s)') }}
    {{ Form::file('photo[]',  array('multiple'=>true)) }}
</div>
<div class="form-group">
    {{ Form::label('menu', 'Menu') }}
    {{ Form::select('menu', array('L' => 'Large', 'S' => 'Small'), null, ['class' => 'form-control','placeholder' => 'Escolha o Menu...']) }}
</div>
<div class="form-group">
    {{ Form::label('category', 'Categoria') }}
    {{ Form::select('category', array('L' => 'Large', 'S' => 'Small'), null, ['class' => 'form-control','placeholder' => 'Escolha a Categoria...']) }}
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
    {{ Form::select('tags[]', array('L' => 'Large', 'S' => 'Small'), null, ['class' => 'form-control','multiple'])}}
</div>

<div class="form-group">
    {{ Form::label('ativo', 'Ativo') }}
    {{ Form::checkbox('status', '1', false, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) }}
</div>
