<table class="table table-striped">
    <tr>
        <th>{{ trans('validation.attributes.page') }}</th>
        <th>{{ trans('validation.attributes.status') }}</th>
        <th>{{ trans('validation.attributes.section') }}</th>
        <th>{{ trans('validation.attributes.area') }}</th>
        <th>{{ trans('validation.attributes.actions') }}</th>
        <th></th>
        <th></th>
    </tr>
    @foreach($activeEdition->editionsection as $sections)
        @foreach($sections->pages as $pages)
            <tr>
                <td>{{ $pages->page_number }}</td>
                <td>{{ $pages->status_text }}</td>
                <td>{{ $sections->section->name }}</td>
                @if($pages->area == null)
                    <td>Sin área</td>
                @else
                <td>{{ $pages->area->name }}</td>
                @endif
                @if($pages->status == 3)
                <td><a href="#" class="btn btn-danger">{{ trans('validation.attributes.edit') }}</a></td>
                <td><a href="#" class="btn btn-danger">{{ trans('validation.attributes.assign_notes') }}</a></td>
                @else
                    <td><a href="{{route('active-pages.edit', $pages->id)}}" class="btn btn-primary">{{ trans('validation.attributes.edit') }}</a></td>
                    <td><a href="{{route('active-pages.add-notes', $pages->id)}}" class="btn btn-primary">{{ trans('validation.attributes.assign_notes') }}</a></td>
                @endif
                @if($pages->status == 2)
                    <td>
                        {!! Form::open(['route' => ['active-pages.send-to-photographer', $pages->id], 'method' => 'POST']) !!}
                        {!! Form::hidden('status', 3) !!}
                        <button type="submit" class="btn btn-primary">{{ trans('validation.attributes.send_to_photographer') }}</button>
                        {!! Form::close() !!}
                    </td>
                @elseif($pages->status == 3)
                    <td><a href="#" class="btn btn-danger">{{ trans('validation.attributes.sent_to_photographer') }}</a></td>
                @else
                    <td>Sin notas asignadas</td>
                @endif
            </tr>
        @endforeach
    @endforeach
</table>