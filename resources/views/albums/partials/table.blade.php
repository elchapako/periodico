<h3>{{$album->name}}</h3>
<p>{{$album->description}}</p>
<p>{{count($album->Photos)}} image(s).</p>
<p>Created date:  {{ date("d F Y",strtotime($album->created_at)) }} at {{date("g:ha",strtotime($album->created_at)) }}</p>
<p><a href="{{route('albums.show', $album->id)}}" class="btn btn-big btn-default">{{ trans('validation.attributes.show_gallery') }}</a></p>