<div class="form-group">
    {!! Form::label('title', trans('validation.attributes.title')) !!}
    {!! $note->title!!}
</div>
<div class="form-group">
    {!! Form::label('note', trans('validation.attributes.note')) !!}
    {!! $note->note!!}
</div>
@if($note->image == null)
    {!! Form::open(['route' => ['photo-pages.store', $note->id], 'method' => 'POST', 'files' => 'true']) !!}
    <div class="form-group">
        {!! Form::label('image','Imagen')!!}
        {!! Form::file('image',null,['class' => 'form-control']) !!}
    </div>
    <button type="submit" class="btn btn-default">{{ trans('validation.attributes.save_photo') }}</button>
    {!! Form::close() !!}
@else
    <b><p>ya guardo una imagen para esta noticia</p></b>
@endif