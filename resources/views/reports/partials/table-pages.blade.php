<table class="table table-striped">
    <tr>
        <th>{{ trans('validation.attributes.page') }}</th>
        <th>{{ trans('validation.attributes.section') }}</th>
        <th>{{ trans('validation.attributes.area') }}</th>
        <th>{{ trans('validation.attributes.status') }}</th>
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
                <td><span class="label label-info">{{ $pages->status_text }}</span></td>
            </tr>
        @endforeach
    @endforeach
</table>