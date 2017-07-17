@foreach($activePages->editionsection as $sections)
    <p>{{$sections->section->name}}</p>
<table class="table table-striped">
    <tr>
        <th>{{ trans('validation.attributes.page') }}</th>
        <th>{{ trans('validation.attributes.created') }}</th>
        <th>{{ trans('validation.attributes.assigning_notes') }}</th>
        <th>{{ trans('validation.attributes.assigned_notes') }}</th>
        <th>{{ trans('validation.attributes.added_photos') }}</th>
        <th>{{ trans('validation.attributes.designed') }}</th>
        <th>{{ trans('validation.attributes.revised') }}</th>
        <th>{{ trans('validation.attributes.printed') }}</th>
    </tr>
        @foreach($sections->pages as $active)
        <tr>
            <td>{{$active->page_number}}</td>
            @foreach($pages as $page)
                    @if($active->id == $page->subject_id)
                        @foreach($users as $user)
                            @if($user->id == $page->causer_id)
                                <td>{{date("g:i:s a", strtotime($page->created_at)) }} {{ trans('validation.attributes.by') }} {{$user->name}} - {{$user->getRole()}}</td>
                            @endif
                        @endforeach
                    @endif
            @endforeach
                </tr>
        @endforeach
</table>
@endforeach