<div class="form-group">
    {!! Form::label('area_id', trans('validation.attributes.area')) !!}
    {!! Form::select('area_id', $areas, null, ['placeholder' => 'Select a area...']) !!}
</div>
<div class="form-group">
    {!! Form::label('model_id', trans('validation.attributes.model')) !!}
    {!! Form::select('model_id', $models, null, ['placeholder' => 'Select a model...']) !!}
</div>