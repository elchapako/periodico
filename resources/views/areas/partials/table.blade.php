<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Area Name</th>
        <th>Actions</th>
        <th></th>
    </tr>
    @foreach($areas as $area)
        <tr>
            <td>{{ $area->id }}</td>
            <td>{{ $area->name }}</td>
            <td><a href="{{route('areas.edit', $area->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                {!! Form::open(['route' => ['areas.destroy', $area->id], 'method' => 'DELETE']) !!}
                    <button type="submit" class="btn btn-danger">Delete</button>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</table>