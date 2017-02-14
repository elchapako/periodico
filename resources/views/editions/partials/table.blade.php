<table class="table table-striped">
    <tr>
        <th>{{ trans('validation.attributes.date') }}</th>
        <th>{{ trans('validation.attributes.number_of_edition') }}</th>
        <th>{{ trans('validation.attributes.status') }}</th>
    </tr>
    @foreach($editions as $edition)
        <tr>
            <td>{{$edition->date}}</td>
            <td>{{$edition->number_of_edition}}</td>
            <td>{{$edition->status}}</td>
        </tr>
    @endforeach
</table>