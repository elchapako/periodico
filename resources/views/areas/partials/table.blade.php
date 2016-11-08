<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>{{ trans('validation.attributes.area_name') }}</th>
        <th>{{ trans('validation.attributes.actions') }}</th>
        <th></th>
    </tr>
    @foreach($areas as $area)
        <tr>
            <td>{{ $area->id }}</td>
            <td>{{ $area->name }}</td>
            <td><a href="{{route('areas.edit', $area->id)}}" class="btn btn-primary">{{ trans('validation.attributes.edit') }}</a></td>
            <td>
                {!! Form::open(['route' => ['areas.destroy', $area->id], 'method' => 'DELETE']) !!}
                    <button type="submit" class="btn btn-danger">{{ trans('validation.attributes.delete') }}</button>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</table>