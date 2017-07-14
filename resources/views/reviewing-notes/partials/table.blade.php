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
            @if($note->status == 2)
                <td><a href="{{route('reviewing-notes.edit', $note->id)}}" class="btn btn-primary">{{ trans('validation.attributes.edit') }}</a></td>
                <td>
                    {!! Form::open(['route' => ['reviewing-notes.corrected', $note->id], 'method' => 'POST']) !!}
                    {!! Form::hidden('status', 3) !!}
                    <button type="submit" class="btn btn-success">{{ trans('validation.attributes.corrected_note') }}</button>
                    {!! Form::close() !!}
                </td>
            @else
                <td>Noticia Corregida</td>
                <td></td>
            @endif
        </tr>
    @endforeach
</table>