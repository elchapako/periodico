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
                    <p>{{Auth::user()->getRole()}}</p>
                    <!-- Status -->
                </div>
            </div>
        @endif
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('message.header') }}</li>
        <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('/') }}"><i class='fa fa-link'></i><span>{{ trans('message.home') }}</span></a></li>
            @if (Auth::user()->isA('reporter', 'admin'))
                <li><a href="{{ route('assigned-notes.index') }}"><i class='fa fa-link'></i> <span>{{ trans('validation.attributes.assigned_notes') }}</span></a></li>
            @endif
            @if (Auth::user()->isA('info-manager', 'admin'))
                <li><a href="{{ route('notes.index') }}"><i class='fa fa-link'></i> <span>{{ trans('validation.attributes.assign_notes') }}</span></a></li>
            @endif
            @if (Auth::user()->isA('editor', 'admin'))
                <li><a href="{{ route('editions.index') }}"><i class='fa fa-link'></i> <span>{{ trans('validation.attributes.editions') }}</span></a></li>
                <li><a href="{{ route('corrected-notes.index') }}"><i class='fa fa-link'></i> <span>{{ trans('validation.attributes.corrected_notes') }}</span></a></li>
                <li><a href="{{ route('active-ads.index') }}"><i class='fa fa-link'></i> <span>{{ trans('validation.attributes.active_ads') }}</span></a></li>
                <li><a href="{{ route('active-pages.index') }}"><i class='fa fa-link'></i> <span>{{ trans('validation.attributes.active_pages') }}</span></a></li>
                <li class=“treeview">
                    <a href="#"><i class='fa fa-link'></i><span>{{ trans('validation.attributes.config') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('areas.index') }}"><i class='fa fa-link'></i><span>{{ trans('message.areas') }}</span></a></li>

                        <li><a href="{{ route('sections.index') }}"><i class='fa fa-link'></i><span>{{ trans('message.sections') }}</span></a></li>
                        <li><a href="{{ route('models.index') }}"><i class='fa fa-link'></i><span>{{ trans('message.models') }}</span></a></li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->isA('secretary', 'admin'))
                <li class="treeview">
                    <a href="#"><i class='fa fa-link'></i><span>{{ trans('message.publicity') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('ads.index') }}"><i class='fa fa-link'></i>{{ trans('message.advertising') }}</a></li>
                        <li><a href="{{ route('clients.index') }}"><i class='fa fa-link'></i>{{ trans('message.clients') }}</a></li>
                        <li><a href="{{ route('sizes.index') }}"><i class='fa fa-link'></i>{{ trans('message.sizes') }}</a></li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->isA('owner', 'admin'))
                <li><a href="{{ route('reports.index') }}"><i class='fa fa-link'></i> <span>{{ trans('validation.attributes.reports') }}</span></a></li>
            @endif
            @if (Auth::user()->isA('review-manager', 'admin'))
                <li><a href="{{ route('reviewing-notes.index') }}"><i class='fa fa-link'></i> <span>{{ trans('validation.attributes.review_notes') }}</span></a></li>
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
