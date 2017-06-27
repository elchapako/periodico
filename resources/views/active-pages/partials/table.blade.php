<table class="table table-striped">
    <tr>
        <th>{{ trans('validation.attributes.page') }}</th>
        <th>{{ trans('validation.attributes.status') }}</th>
        <th>{{ trans('validation.attributes.section') }}</th>
        <th>{{ trans('validation.attributes.area') }}</th>
        <th>{{ trans('validation.attributes.actions') }}</th>
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
                <td><a href="{{route('active-pages.edit', $pages->id)}}" class="btn btn-primary">{{ trans('validation.attributes.edit') }}</a></td>
                <td></td>
            </tr>
        @endforeach
    @endforeach
</table>