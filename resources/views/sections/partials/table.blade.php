<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Section Name</th>
        <th>Actions</th>
        <th></th>
    </tr>
    @foreach($sections as $section)
        <tr>
            <td>{{ $section->id }}</td>
            <td>{{ $section->name }}</td>
            <td><a href="{{route('sections.edit', $section->id)}}" class="btn btn-primary">Edit</a></td>
            <td>{!! Form::open(['route' => ['sections.destroy', $section->id], 'method' => 'DELETE']) !!}
                <button type="submit" class="btn btn-danger">Delete</button>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</table>