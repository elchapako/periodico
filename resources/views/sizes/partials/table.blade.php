<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Size</th>
        <th>Actions</th>
        <th></th>
    </tr>
    @foreach($sizes as $size)
        <tr>
            <td>{{ $size->id }}</td>
            <td>{{ $size->size }}</td>
            <td><a href="{{route('sizes.edit', $size->id)}}" class="btn btn-primary">Edit</a></td>
            <td>{!! Form::open(['route' => ['sizes.destroy', $size->id], 'method' => 'DELETE']) !!}
                <button type="submit" class="btn btn-danger">Delete</button>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</table>