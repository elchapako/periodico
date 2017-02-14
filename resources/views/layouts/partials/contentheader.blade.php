<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Page Header here')
        <small>@yield('contentheader_description')</small>
    </h1>

    <!-- composer view -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <table class="table table-striped">
                    <tr>
                        <th>{{ trans('validation.attributes.date') }}</th>
                        <th>{{ trans('validation.attributes.number_of_edition') }}</th>
                        <th>{{ trans('validation.attributes.status') }}</th>
                    </tr>
                    @foreach($edition as $ed)
                        <tr>
                            <td>{{$ed->date}}</td>
                            <td>{{$ed->number_of_edition}}</td>
                            <td>{{$ed->status}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <!-- composer view -->

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('adminlte_lang::message.level') }}</a></li>
        <li class="active">{{ trans('adminlte_lang::message.here') }}</li>
    </ol>
</section>