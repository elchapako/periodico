<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>{{ trans('validation.attributes.full_name') }}</th>
        <th>{{ trans('validation.attributes.phone') }}</th>
        <th>{{ trans('validation.attributes.cellphone') }}</th>
        <th>{{ trans('validation.attributes.id') }}</th>
        <th>{{ trans('validation.attributes.address') }}</th>
        <th>{{ trans('validation.attributes.email') }}</th>
        <th>{{ trans('validation.attributes.actions') }}</th>
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
            <td><a href="{{route('clients.edit', $client->id)}}" class="btn btn-primary">{{ trans('validation.attributes.edit') }}</a></td>
            <td>
                {!! Form::open(['route' => ['clients.destroy', $client->id], 'method' => 'DELETE']) !!}
                <button type="submit" class="btn btn-danger">{{ trans('validation.attributes.delete') }}</button>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</table>