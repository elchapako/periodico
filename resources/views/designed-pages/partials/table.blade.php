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
            <td>{{ $page->area->name }}</td>
            <td><a href="{{route('designed-pages.show-page', $page->id)}}" class="btn btn-primary">{{ trans('validation.attributes.show_page') }}</a></td>
            @if($page->reviewed == null)
                <td></td>
            @else
                <td>
                    {!! Form::open(['route' => ['designed-pages.reviewed-ready', $page->id], 'method' => 'POST']) !!}
                    {!! Form::hidden('status', 6) !!}
                    <button type="submit" class="btn btn-success">{{ trans('validation.attributes.reviewed_page') }}</button>
                    {!! Form::close() !!}
                </td>
            @endif
        </tr>
    @endforeach
</table>