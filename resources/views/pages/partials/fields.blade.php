<div class="form-group">
    {!! Form::label('area_id', trans('validation.attributes.area')) !!}
    {!! Form::select('area_id', $areas) !!}
</div>
<div class="form-group">
    {!! Form::label('section_id', trans('validation.attributes.section')) !!}
    {!! Form::select('section_id', $sections) !!}
</div>