<table class="table table-striped">
    <tr>
        <th>{{ trans('validation.attributes.page') }}</th>
        <th>{{ trans('validation.attributes.section') }}</th>
        <th>{{ trans('validation.attributes.area') }}</th>
        <th>{{ trans('validation.attributes.actions') }}</th>
        <th></th>
    </tr>
        @foreach($pages as $page)
            <tr>
                <td>{{ $page->page_number }}</td>
                <td>{{ $page->editionsection->section->name }}</td>
                @if($page->area == null)
                    <td>Sin área</td>
                @else
                    <td>{{ $page->area->name }}</td>
                @endif
                <td><a href="{{route('photo-pages.show', $page->id)}}" class="btn btn-primary">{{ trans('validation.attributes.show_notes') }}</a></td>
                {{ $count = 0 }}
                @foreach($page->notes as $note)
                    @if($note->image==null)
                        {{$count = $count+1}}
                    @endif
                @endforeach
                @if($count==0 & $page->status == 3)
                    <td>
                        {!! Form::open(['route' => ['photo-pages.send-to-designer', $page->id], 'method' => 'POST']) !!}
                        {!! Form::hidden('status', 4) !!}
                        <button type="submit" class="btn btn-primary">{{ trans('validation.attributes.send_to_designer') }}</button>
                        {!! Form::close() !!}
                    </td>
                @else
                    <td>Faltan agregar fotos</td>
                @endif
            </tr>
        @endforeach
</table>