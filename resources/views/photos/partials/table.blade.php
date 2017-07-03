<table>
    <tr>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <td>{{$photo->name}}</td>
        <td><a href="{{route('photos.edit', $photo->id)}}" class="btn btn-primary">{{ trans('validation.attributes.edit') }}</a></td>
        <td>{!! Form::open(['route' => ['photos.destroy', $photo->id], 'method' => 'DELETE']) !!}
            <button type="submit" class="btn btn-danger">{{ trans('validation.attributes.delete') }}</button>
            {!! Form::close() !!}</td>
    </tr>
</table>