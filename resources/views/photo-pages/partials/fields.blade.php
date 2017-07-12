<table class="table table-striped">
    <tr>
        <th>{{ trans('validation.attributes.title') }}</th>
        <th>{{ trans('validation.attributes.actions') }}</th>
    </tr>
    @foreach($notes as $note)
        <tr>
            <td>{{ $note->title }}</td>
            <td><a href="{{route('photo-pages.photo-note', $note->id)}}" class="btn btn-primary">{{ trans('validation.attributes.view_note') }}</a></td>
        </tr>
    @endforeach
</table>