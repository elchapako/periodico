<div class="form-group">
    {!! Form::label('area_id', trans('validation.attributes.area')) !!}
    {!! Form::select('area_id', $areas, null, ['placeholder' => 'Select a area...']) !!}
</div>