<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>{{ trans('validation.attributes.reporter') }}</th>
        <th>{{ trans('validation.attributes.title') }}</th>
        <th>{{ trans('validation.attributes.assigned') }}</th>
        <th>{{ trans('validation.attributes.presented') }}</th>
    </tr>
    @foreach($notes as $key => $note)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$note->reporter->name}}</td>
            <td>{{$note->title}}</td>
            @foreach($activityNotes as $active)
                @if($note->id == $active->subject_id)
                    <td>{{date("g:i:s a", strtotime($active->created_at)) }} </td>
                @endif
            @endforeach
        </tr>
    @endforeach
</table>