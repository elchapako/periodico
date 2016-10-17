<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Full name</th>
        <th>Phone</th>
        <th>Cellphone</th>
        <th>C.I.</th>
        <th>Address</th>
        <th>Email</th>
        <th>Actions</th>
        <th></th>
    </tr>
    @foreach($clients as $client)
        <tr>
            <td>{{$client->id}}</td>
            <td>{{$client->full_name}}</td>
            <td>{{$client->phone}}</td>
            <td>{{$client->cellphone}}</td>
            <td>{{$client->ci}}</td>
            <td>{{$client->address}}</td>
            <td>{{$client->email}}</td>
            <td><a href="{{route('clients.edit', $client->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                {!! Form::open(['route' => ['clients.destroy', $client->id], 'method' => 'DELETE']) !!}
                <button type="submit" class="btn btn-danger">Delete</button>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</table>