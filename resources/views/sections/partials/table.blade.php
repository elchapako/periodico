<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>{{ trans('validation.attributes.section_name') }}</th>
        <th>{{ trans('validation.attributes.pages') }}</th>
        <th>{{ trans('validation.attributes.isregular') }}</th>
        <th>{{ trans('validation.attributes.actions') }}</th>
        <th></th>
    </tr>
    @foreach($sections as $section)
        <tr>
            <td>{{ $section->id }}</td>
            <td>{{ $section->name }}</td>
            <td>{{ $section->pages }}</td>
            @if ($section->isRegular == true)
                <td>{{ trans('validation.attributes.true') }}</td>
            @else
                <td>{{ trans('validation.attributes.false') }}</td>
            @endif
            <td><a href="{{route('sections.edit', $section->id)}}" class="btn btn-primary">{{ trans('validation.attributes.edit') }}</a></td>
            <td>{!! Form::open(['route' => ['sections.destroy', $section->id], 'method' => 'DELETE']) !!}
                <button type="submit" class="btn btn-danger">{{ trans('validation.attributes.delete') }}</button>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</table>