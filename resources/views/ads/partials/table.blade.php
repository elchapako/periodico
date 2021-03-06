<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>{{ trans('validation.attributes.name') }}</th>
        <th>{{ trans('validation.attributes.color') }}</th>
        <th>{{ trans('validation.attributes.section') }}</th>
        <th>{{ trans('validation.attributes.size') }}</th>
        <th>{{ trans('validation.attributes.client') }}</th>
        <th>{{ trans('validation.attributes.actions') }}</th>
        <th></th>
    </tr>
    @foreach($ads as $ad)
        <tr>
            <td>{{$ad->id}}</td>
            <td>{{$ad->name}}</td>
            <td>{{$ad->color}}</td>
            <td>{{$ad->section->name}}</td>
            <td>{{$ad->size->size}}</td>
            <td>{{$ad->client->full_name}}</td>
            <td><a href="{{route('ads.edit', $ad->id)}}" class="btn btn-primary">{{ trans('validation.attributes.edit') }}</a></td>
            <td>
                {!! Form::open(['route' => ['ads.destroy', $ad->id], 'method' => 'DELETE']) !!}
                <button type="submit" class="btn btn-danger">{{ trans('validation.attributes.delete') }}</button>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</table>