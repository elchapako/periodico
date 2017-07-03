<div class="form-group">
    {!! Form::label('title', trans('validation.attributes.title')) !!}
    {!! Form::text('title', null, array('disabled'), ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('area_id', trans('validation.attributes.area')) !!}
    {!! Form::select('area_id', $area, null, array('disabled'), ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('reporter_id', trans('validation.attributes.reporter')) !!}
    {!! Form::select('reporter_id', $reporter, null, array('disabled'), ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    @if($note->titular==1)
        {{ Form::checkbox('titular', 1, true) }} {!! Form::label('titular', trans('validation.attributes.titular')) !!}
    @else
        {{ Form::checkbox('titular', 1, false) }} {!! Form::label('titular', trans('validation.attributes.titular')) !!}
    @endif
</div>
<div class="form-group">
    @if($note->photo==1)
        {{ Form::checkbox('photo', 1, true) }} {!! Form::label('photo', trans('validation.attributes.photo')) !!}
    @else
        {{ Form::checkbox('photo', 1, false) }} {!! Form::label('photo', trans('validation.attributes.photo')) !!}
    @endif
</div>
<div class="form-group">
    {!! Form::label('note', trans('validation.attributes.note')) !!}
    {!! Form::textarea('note', null, ['class' => 'ckeditor', 'placeholder' => 'Write the note here...']) !!}
</div>
