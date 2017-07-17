<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{$activeEdition->pages_count}}</h3>

                <p>{{ trans('validation.attributes.pages') }}</p>
            </div>
            <div class="icon">
                <i class="ion ion-document-text"></i>
            </div>
            <a href="{{route('reports.infoPages')}}" class="small-box-footer">{{ trans('validation.attributes.more_info') }} <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{count($notes)}}</h3>

                <p>{{ trans('validation.attributes.notes') }}</p>
            </div>
            <div class="icon">
                <i class="ion ion-edit"></i>
            </div>
            <a href="#" class="small-box-footer">{{ trans('validation.attributes.more_info') }} <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{count($activeEdition)}}</h3>

                <p>{{ trans('validation.attributes.editions') }}</p>
            </div>
            <div class="icon">
                <i class="ion ion-clock"></i>
            </div>
            <a href="#" class="small-box-footer">{{ trans('validation.attributes.more_info') }} <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">{{ trans('validation.attributes.more_info') }} <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->