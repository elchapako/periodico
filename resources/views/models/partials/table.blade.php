<table>
    <tr>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <td><h4>{{$model->name}} : </h4></td>
        <td><a href="{{route('models.edit', $model->id)}}" class="btn btn-primary">{{ trans('validation.attributes.edit') }}</a></td>
        <td>{!! Form::open(['route' => ['models.destroy', $model->id], 'method' => 'DELETE']) !!}
            <button type="submit" class="btn btn-danger">{{ trans('validation.attributes.delete') }}</button>
            {!! Form::close() !!}</td>
    </tr>
</table>