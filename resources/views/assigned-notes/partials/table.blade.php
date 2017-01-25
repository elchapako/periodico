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
            <td><a href="{{route('assigned-notes.edit', $note->id)}}" class="btn btn-primary">{{ trans('validation.attributes.edit') }}</a></td>
            <td>
                {!! Form::open(['route' => ['assigned-notes.destroy', $note->id], 'method' => 'DELETE']) !!}
                <button type="submit" class="btn btn-danger">{{ trans('validation.attributes.delete') }}</button>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</table>