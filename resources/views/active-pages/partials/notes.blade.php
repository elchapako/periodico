<div class="form-group">
    {!! Form::label('note_id', trans('validation.attributes.note')) !!}
    {!! Form::select('note_id[]',$notes,null,['class' => 'form-control','multiple' => true]) !!}
</div>