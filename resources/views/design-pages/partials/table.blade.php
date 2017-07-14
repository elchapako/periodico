<table class="table table-striped">
    <tr>
        <th>{{ trans('validation.attributes.page') }}</th>
        <th>{{ trans('validation.attributes.section') }}</th>
        <th>{{ trans('validation.attributes.area') }}</th>
        <th>{{ trans('validation.attributes.ads') }}</th>
        <th>{{ trans('validation.attributes.model') }}</th>
        <th>{{ trans('validation.attributes.actions') }}</th>
        <th></th>
    </tr>
    @foreach($pages as $page)
        <tr>
            <td>{{ $page->page_number }}</td>
            <td>{{ $page->editionsection->section->name }}</td>
            <td>{{ $page->area->name }}</td>
            <td>
            @foreach($page->ads as $ad)
                @if($ad == null)
                    <td></td>
                @else
                    {{$ad->size->size}}<br>
                @endif
            @endforeach
            </td>
            <td>{{ $page->model->name }}</td>
            <td><a href="{{route('ready-pages-to-design.show-page', $page->id)}}" class="btn btn-primary">{{ trans('validation.attributes.show_page') }}</a></td>
            @if($page->designed == null)
                <td></td>
            @else
                <td>
                    {!! Form::open(['route' => ['ready-pages-to-design.designed', $page->id], 'method' => 'POST']) !!}
                    {!! Form::hidden('status', 5) !!}
                    <button type="submit" class="btn btn-success">{{ trans('validation.attributes.designed_ready') }}</button>
                    {!! Form::close() !!}
                </td>
            @endif
        </tr>
    @endforeach
</table>