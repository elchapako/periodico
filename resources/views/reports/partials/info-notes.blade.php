<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>{{ trans('validation.attributes.title') }}</th>
        <th>{{ trans('validation.attributes.created') }}</th>
        <th>{{ trans('validation.attributes.presented') }}</th>
        <th>{{ trans('validation.attributes.corrected') }}</th>
        <th>{{ trans('validation.attributes.selected') }}</th>
        <th>{{ trans('validation.attributes.published') }}</th>
    </tr>
    @foreach($notes as $key => $note)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$note->title}}</td>
            @foreach($activityNotes as $active)
                @if($note->id == $active->subject_id)
                    @foreach($users as $user)
                        @if($user->id == $active->causer_id)
                            <td>{{date("g:i:s a", strtotime($active->created_at)) }} {{ trans('validation.attributes.by') }} {{$user->name}} - {{$user->getRole()}}</td>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </tr>
    @endforeach
</table>