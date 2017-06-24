<div class="form-group">
    {!! Form::label('name', trans('validation.attributes.ad_name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Write the Ad name here...']) !!}
</div>
<div class="form-group">
    {!! Form::label('color', trans('validation.attributes.color')) !!}
    {!! Form::select('color', ['B&W' => 'B&W', 'Full Color' => 'Full Color']) !!}
</div>
<div class="form-group">
    {!! Form::label('section_id', trans('validation.attributes.section')) !!}
    {!! Form::select('section_id', $sections, null, ['placeholder' => 'Select a section...']) !!}
</div>
<div class="form-group">
    {!! Form::label('size_id', trans('validation.attributes.size')) !!}
    {!! Form::select('size_id', $sizes, null, ['placeholder' => 'Select a size...']) !!}
</div>
<div class="form-group">
    {!! Form::label('client_id', trans('validation.attributes.client')) !!}
    {!! Form::select('client_id', $clients, null, ['placeholder' => 'Select a client...']) !!}
</div>
<div class="input-group date">
    {!! Form::label('dates', trans('validation.attributes.date')) !!}
    {!! Form::text('dates', $dates, ['class' => 'form-control datepicker']) !!}
</div>