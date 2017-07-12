@foreach($notes as $note)
<div class="form-group">
    {!! Form::label('title', trans('validation.attributes.title')) !!}
    {!! $note->title!!}
</div>
<div class="form-group">
    {!! Form::label('note', trans('validation.attributes.note')) !!}
    {!! $note->note!!}
</div>
<div class="form-group">
    {!! Form::label('area', trans('validation.attributes.area')) !!}
    {!! $note->area->name!!}
</div>
@if(!$note->image == null)
<div class="form-group">
    {!! Form::label('photo', trans('validation.attributes.photo')) !!}
<img src="/photos/{{$note->image}}">
</div>
@endif
@endforeach
@if($note->page->template == null)
    {!! Form::open(['route' => ['ready-pages-to-design.store', $note->page->id], 'method' => 'POST', 'files' => 'true']) !!}
    <div class="form-group">
        {!! Form::label('template','Adjuntar Página Diseñada')!!}
        {!! Form::file('template',null,['class' => 'form-control']) !!}
    </div>
    <button type="submit" class="btn btn-default">{{ trans('validation.attributes.save_page') }}</button>
    {!! Form::close() !!}
@else
    <b><p>Ya guardo una página diseñada para esta página</p></b>
@endif