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
            <td><a href="{{route('reviewed-pages.download-page', $page->id)}}" class="btn btn-primary">{{ trans('validation.attributes.download_page') }}</a></td>
            <td>
                {!! Form::open(['route' => ['reviewed-pages.printed', $page->id], 'method' => 'POST']) !!}
                {!! Form::hidden('status', 7) !!}
                <button type="submit" class="btn btn-success">{{ trans('validation.attributes.printed_page') }}</button>
                {!! Form::close() !!}
            </td>

        </tr>
    @endforeach
</table>