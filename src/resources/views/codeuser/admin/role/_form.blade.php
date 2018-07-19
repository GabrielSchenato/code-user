<div class="form-group">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('permissions[]', 'Permissions') !!}
    {!! Form::select('permissions[]', $permissions, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
</div>