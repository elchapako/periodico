<div class="form-group">
    {!! Form::label('title', trans('validation.attributes.title')) !!}:
    {!! Form::label('title', $note->title, null, array('disabled'), ['class' => 'form-control']) !!}
</div>
@if($note->image == null)
{!! Form::open(['route' => ['photo-pages.store', $note->id], 'method' => 'POST', 'files' => 'true']) !!}
<div class="form-group">
    {!! Form::label('image','Imagen')!!}
    {!! Form::file('image',null,['class' => 'form-control']) !!}
</div>
<button type="submit" class="btn btn-default">{{ trans('validation.attributes.save_photo') }}</button>
{!! Form::close() !!}
<a href="{{route('photo-pages.index')}}" class="btn btn-primary">{{ trans('validation.attributes.back') }}</a>
@else
<p>ya guardo una imagen para esta noticia</p>
@endif