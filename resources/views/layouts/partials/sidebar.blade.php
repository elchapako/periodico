<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('message.online') }}</a>
                </div>
            </div>
        @endif
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="{{ url('/') }}"><i class='fa fa-link'></i> <span>{{ trans('message.home') }}</span></a></li>
                @if (Auth::user()->isA('editor', 'admin'))
                <li><a href="{{ url('areas') }}"><i class='fa fa-link'></i> <span>{{ trans('message.areas') }}</span></a></li>
                <li><a href="{{ url('sections') }}"><i class='fa fa-link'></i> <span>{{ trans('message.sections') }}</span></a></li>
                @endif
                @if (Auth::user()->isA('designer', 'admin'))
                <li><a href="{{ url('models') }}"><i class='fa fa-link'></i> <span>{{ trans('message.models') }}</span></a></li>
                @endif
                @if (Auth::user()->isA('secretary', 'admin'))
                <li class="treeview">
                    <a href="#"><i class='fa fa-link'></i> <span>{{ trans('message.publicity') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('ads') }}">{{ trans('message.advertising') }}</a></li>
                        <li><a href="{{ url('clients') }}">{{ trans('message.clients') }}</a></li>
                        <li><a href="{{ url('sizes') }}">{{ trans('message.sizes') }}</a></li>
                    </ul>
                </li>
                @endif
        </ul><!-- /.sidebar-menu -->

    </section>
    <!-- /.sidebar -->
</aside>
