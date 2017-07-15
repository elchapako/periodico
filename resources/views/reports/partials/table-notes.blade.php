<table class="table table-striped">
    <tr>
        <th>{{ trans('validation.attributes.title') }}</th>
        <th>{{ trans('validation.attributes.reporter') }}</th>
        <th>{{ trans('validation.attributes.area') }}</th>
        <th>{{ trans('validation.attributes.status') }}</th>
    </tr>
    @foreach($notes as $note)
        <tr>
            <td>{{ $note->title }}</td>
            <td>{{ $note->reporter->name }}</td>
            @if($note->area == null)
                <td>Sin área</td>
            @else
                <td>{{ $note->area->name }}</td>
            @endif
            <td><span class="label label-info">{{ $note->status_text }}</span></td>
        </tr>
    @endforeach
</table>