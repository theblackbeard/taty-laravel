<div class="form-group">
    {{ Form::label('title', 'Titulo') }}
    {{ Form::text('title', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('ativo', 'Ativo') }}
    {{ Form::checkbox('ativo', '1', true) }}
</div>
<div class="form-group">
    {{ Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) }}
</div>
