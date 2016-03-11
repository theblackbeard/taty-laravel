<div class="form-group">
    {{ Form::label('title', 'Titulo') }}
    {{ Form::text('title', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('ativo', 'Ativo') }}
    {{ Form::checkbox('active') }}
</div>
<div class="form-group">
    {{ Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) }}
</div>
