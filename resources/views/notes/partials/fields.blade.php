<div class="form-group">
    {!! Form::label('title', trans('validation.attributes.title')) !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Write the title here...']) !!}
</div>
<div class="form-group">
    {!! Form::label('area_id', trans('validation.attributes.area')) !!}
    {!! Form::select('area_id', $areas, null, ['placeholder' => 'Select an area...']) !!}
</div>
<div class="form-group">
    {!! Form::label('reporter_id', trans('validation.attributes.reporter')) !!}
    {!! Form::select('reporter_id', $users, null, ['placeholder' => 'Select a reporter...']) !!}
</div>