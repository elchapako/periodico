<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>{{ trans('validation.attributes.name') }}</th>
        <th>{{ trans('validation.attributes.color') }}</th>
        <th>{{ trans('validation.attributes.section') }}</th>
        <th>{{ trans('validation.attributes.size') }}</th>
        <th>{{ trans('validation.attributes.client') }}</th>
    </tr>
    @foreach($ads as $ad)
        <tr>
            <td>{{$ad->id}}</td>
            <td>{{$ad->name}}</td>
            <td>{{$ad->color}}</td>
            <td>{{$ad->section->name}}</td>
            <td>{{$ad->size->size}}</td>
            <td>{{$ad->client->full_name}}</td>
        </tr>
    @endforeach
</table>