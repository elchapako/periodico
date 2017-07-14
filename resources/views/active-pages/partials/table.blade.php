<table class="table table-striped">
    <tr>
        <th>{{ trans('validation.attributes.page') }}</th>
        <th>{{ trans('validation.attributes.section') }}</th>
        <th>{{ trans('validation.attributes.area') }}</th>
        <th>{{ trans('validation.attributes.ads') }}</th>
        <th>{{ trans('validation.attributes.added_notes') }}</th>
        <th>{{ trans('validation.attributes.status') }}</th>
        <th>{{ trans('validation.attributes.actions') }}</th>
        <th></th>
        <th></th>
    </tr>
    @foreach($activeEdition->editionsection as $sections)
        @foreach($sections->pages as $pages)
            <tr>
                <td>{{ $pages->page_number }}</td>
                <td>{{ $sections->section->name }}</td>
                @if($pages->area == null)
                    <td>Sin área</td>
                @else
                <td>{{ $pages->area->name }}</td>
                @endif
                <td>
                @foreach($pages->ads as $ad)
                    @if($ad == null)
                        <td></td>
                    @else
                        {{$ad->size->size}}<br>
                    @endif
                @endforeach
                </td>
                <td>
                @foreach($pages->notes as $note)
                    @if($note == null)
                        <td></td>
                    @else
                        {{$note->title}}<br>
                @endif
                @endforeach
                </td>
                <td><span class="label label-info">{{ $pages->status_text }}</span></td>
                @if($pages->status == 3)
                <td><a href="#" class="btn btn-primary btn-xs" disabled="disabled">{{ trans('validation.attributes.edit_page') }}</a></td>
                <td><a href="#" class="btn btn-primary btn-xs" disabled="disabled">{{ trans('validation.attributes.add_notes') }}</a></td>
                @else
                    <td><a href="{{route('active-pages.edit', $pages->id)}}" class="btn btn-primary btn-xs">{{ trans('validation.attributes.edit_page') }}</a></td>
                    <td><a href="{{route('active-pages.add-notes', $pages->id)}}" class="btn btn-primary btn-xs">{{ trans('validation.attributes.add_notes') }}</a></td>
                @endif
                @if($pages->status == 2)
                    <td>
                        {!! Form::open(['route' => ['active-pages.added-notes', $pages->id], 'method' => 'POST']) !!}
                        {!! Form::hidden('status', 3) !!}
                        <button type="submit" class="btn btn-success btn-xs">{{ trans('validation.attributes.added_notes_ready') }}</button>
                        {!! Form::close() !!}
                    </td>
                @elseif($pages->status == 3)
                    <td><a href="#" class="btn btn-primary btn-xs" disabled="disabled">{{ trans('validation.attributes.added_notes_ready') }}</a></td>
                @else
                    <td><a href="#" class="btn btn-primary btn-xs" disabled="disabled">{{ trans('validation.attributes.added_notes_ready') }}</a></td>
                @endif
            </tr>
        @endforeach
    @endforeach
</table>