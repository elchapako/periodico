<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Color</th>
        <th>Section</th>
        <th>Size</th>
        <th>Client</th>
        <th>Actions</th>
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
            <td><a href="{{route('ads.edit', $ad->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                {!! Form::open(['route' => ['ads.destroy', $ad->id], 'method' => 'DELETE']) !!}
                <button type="submit" class="btn btn-danger">Delete</button>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</table>