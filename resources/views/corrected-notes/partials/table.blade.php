<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>{{ trans('validation.attributes.title') }}</th>
        <th>{{ trans('validation.attributes.area') }}</th>
        <th>{{ trans('validation.attributes.reporter') }}</th>
        <th>{{ trans('validation.attributes.actions') }}</th>
        <th></th>
    </tr>
    @foreach($notes as $note)
        <tr>
            <td>{{$note->id}}</td>
            <td>{{$note->title}}</td>
            <td>{{$note->area->name}}</td>
            <td>{{$note->reporter->name}}</td>
            @if($note->status == 3)
                <td><a href="{{route('corrected-notes.edit', $note->id)}}" class="btn btn-primary">{{ trans('validation.attributes.edit') }}</a></td>
            @else
                <td>Noticia Corregida</td>
                <td></td>
            @endif
        </tr>
    @endforeach
</table>