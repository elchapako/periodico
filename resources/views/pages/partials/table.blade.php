<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>{{ trans('validation.attributes.area') }}</th>
        <th>{{ trans('validation.attributes.section') }}</th>
        <th>{{ trans('validation.attributes.actions') }}</th>
    </tr>
    @foreach($pages as $page)
        <tr>
            <td>{{$page->id}}</td>
            <td>{{$page->area->name}}</td>
            <td>{{$page->section->name}}</td>
            <td></td>
        </tr>
    @endforeach
</table>