{!! Form::label('ads', trans('validation.attributes.ads')) !!}:
@foreach($page->ads as $ad)
    @if($ad == null)

    @else
    <div class="form-group">
        {!! Form::label('name', trans('validation.attributes.name')) !!}
        {{$ad->name}}
    </div>
    <div class="form-group">
        {!! Form::label('color', trans('validation.attributes.color')) !!}
        {{$ad->color}}
    </div>
    <div class="form-group">
        {!! Form::label('size', trans('validation.attributes.size')) !!}
        {{$ad->size->size}}<br>
    </div>
    @endif
@endforeach
{!! Form::label('notes', trans('validation.attributes.notes')) !!}:
@foreach($page->notes as $note)
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
@if($page->designed == null)
    {!! Form::open(['route' => ['ready-pages-to-design.store', $page->id], 'method' => 'POST', 'files' => 'true']) !!}
    <div class="form-group">
        {!! Form::label('template','Adjuntar Página Diseñada')!!}
        {!! Form::file('template',null,['class' => 'form-control']) !!}
    </div>
    <button type="submit" class="btn btn-default">{{ trans('validation.attributes.save_page') }}</button>
    {!! Form::close() !!}
@else
    <b><p>Ya guardo una página diseñada para esta página</p></b>
@endif