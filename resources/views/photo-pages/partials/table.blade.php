<table class="table table-striped">
    <tr>
        <th>{{ trans('validation.attributes.page') }}</th>
        <th>{{ trans('validation.attributes.section') }}</th>
        <th>{{ trans('validation.attributes.area') }}</th>
        <th>{{ trans('validation.attributes.actions') }}</th>
        <th></th>
    </tr>
        @foreach($pages as $page)
            <tr>
                <td>{{ $page->page_number }}</td>
                <td>{{ $page->editionsection->section->name }}</td>
                @if($page->area == null)
                    <td>Sin área</td>
                @else
                    <td>{{ $page->area->name }}</td>
                @endif
                <td><a href="{{route('photo-pages.show', $page->id)}}" class="btn btn-primary">{{ trans('validation.attributes.show_notes') }}</a></td>
                <td></td>
            </tr>
        @endforeach
</table>