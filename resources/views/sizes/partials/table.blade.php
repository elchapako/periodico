<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>{{ trans('validation.attributes.size') }}</th>
        <th>{{ trans('validation.attributes.actions') }}</th>
        <th></th>
    </tr>
    @foreach($sizes as $size)
        <tr>
            <td>{{ $size->id }}</td>
            <td>{{ $size->size }}</td>
            <td><a href="{{route('sizes.edit', $size->id)}}" class="btn btn-primary">{{ trans('validation.attributes.edit') }}</a></td>
            <td>{!! Form::open(['route' => ['sizes.destroy', $size->id], 'method' => 'DELETE']) !!}
                <button type="submit" class="btn btn-danger">{{ trans('validation.attributes.delete') }}</button>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</table>