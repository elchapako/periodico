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
    {!! Form::select('section_id', $sections) !!}
</div>
<div class="form-group">
    {!! Form::label('size_id', trans('validation.attributes.size')) !!}
    {!! Form::select('size_id', $sizes) !!}
</div>
<div class="form-group">
    {!! Form::label('client_id', trans('validation.attributes.client')) !!}
    {!! Form::select('client_id', $clients) !!}
</div>