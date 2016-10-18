<div class="form-group">
    {!! Form::label('name', 'Ad Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Write the Ad name here...']) !!}
</div>
<div class="form-group">
    {!! Form::label('color', 'Color') !!}
    {!! Form::select('color', ['B&W' => 'B&W', 'Full Color' => 'Full Color']) !!}
</div>
<div class="form-group">
    {!! Form::label('section_id', 'Section') !!}
    {!! Form::select('section_id', $sections) !!}
</div>
<div class="form-group">
    {!! Form::label('size_id', 'Size') !!}
    {!! Form::select('size_id', $sizes) !!}
</div>
<div class="form-group">
    {!! Form::label('client_id', 'Client') !!}
    {!! Form::select('client_id', $clients) !!}
</div>