<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>{{ trans('validation.attributes.title') }}</th>
        <th>{{ trans('validation.attributes.area') }}</th>
        <th>{{ trans('validation.attributes.actions') }}</th>
        <th></th>
    </tr>
    @foreach($notes as $note)
        <tr>
            <td>{{$note->id}}</td>
            <td>{{$note->title}}</td>
            <td>{{$note->area->name}}</td>
            @if($note->status == 1)
            <td><a href="{{route('assigned-notes.edit', $note->id)}}" class="btn btn-primary">{{ trans('validation.attributes.edit') }}</a></td>
            <td>{!! Form::open(['route' => ['assigned-notes.correction', $note->id], 'method' => 'POST']) !!}
                {!! Form::hidden('status', 2) !!}
                <button type="submit" class="btn btn-primary">{{ trans('validation.attributes.send_to_correction') }}</button>
                {!! Form::close() !!}
            </td>
                @else
                <td>Noticia enviada a corrección</td>
            @endif
        </tr>
    @endforeach
</table>