<div class="form-group">
    {!! Form::label('title', trans('validation.attributes.title')) !!}
    {!! Form::text('title', null, array('disabled'), ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('area_id', trans('validation.attributes.area')) !!}
    {!! Form::select('area_id', $area, null, array('disabled'), ['class' => 'form-block']) !!}
</div>
<div class="form-group">
    {!! Form::label('note', trans('validation.attributes.note')) !!}
    {!! Form::textarea('note', null, ['class' => 'ckeditor', 'placeholder' => 'Write the note here...']) !!}
</div>