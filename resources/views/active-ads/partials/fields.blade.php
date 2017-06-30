<div class="form-group">
    {!! Form::label('page_id', trans('validation.attributes.page')) !!}
    {!! Form::select('page_id', $pages, null, ['placeholder' => 'Select a page...']) !!}
</div>