<div class="form-group">
    {!! Form::label('page', trans('validation.attributes.download_page')) !!}:
    <a href="{{route('designed-pages.download-page', $page->id)}}" class="btn btn-primary">{{ trans('validation.attributes.download_page') }}</a>
</div>
{!! Form::open(['route' => ['designed-pages.reviewed', $page->id], 'method' => 'POST', 'files' => 'true']) !!}
<div class="form-group">
    {!! Form::label('template','Adjuntar Página Revisada')!!}
    {!! Form::file('template',null,['class' => 'form-control']) !!}
</div>
<button type="submit" class="btn btn-default">{{ trans('validation.attributes.save_page') }}</button>
{!! Form::close() !!}
