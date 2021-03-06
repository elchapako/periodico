<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{Gravatar::fallback('http://urlto.example.com/avatar.jpg')->get(Auth::user()->email)}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <p>{{ Auth::user()->getRole()}}</p>
                    <!-- Status -->
                </div>
            </div>
        @endif
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('message.header') }}</li>
        <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('/') }}"><i class='fa fa-home'></i><span>{{ trans('message.home') }}</span></a></li>
            @if (Auth::user()->isA('reporter', 'admin'))
                <li><a href="{{ route('assigned-notes.index') }}"><i class='fa fa-pencil'></i> <span>{{ trans('validation.attributes.assigned_notes') }}</span></a></li>
            @endif
            @if (Auth::user()->isA('info-manager', 'admin'))
                <li><a href="{{ route('notes.index') }}"><i class='fa fa-file-text-o'></i> <span>{{ trans('validation.attributes.assign_notes') }}</span></a></li>
            @endif
            @if (Auth::user()->isA('editor', 'admin'))
                <li><a href="{{ route('editions.index') }}"><i class='fa fa-spinner'></i> <span>{{ trans('validation.attributes.editions') }}</span></a></li>
                <li><a href="{{ route('corrected-notes.index') }}"><i class='fa fa-align-justify'></i> <span>{{ trans('validation.attributes.corrected_notes') }}</span></a></li>
                <li><a href="{{ route('active-ads.index') }}"><i class='fa fa-list-ol'></i> <span>{{ trans('validation.attributes.active_ads') }}</span></a></li>
                <li><a href="{{ route('active-pages.index') }}"><i class='fa fa-check-square-o'></i> <span>{{ trans('validation.attributes.active_pages') }}</span></a></li>
                <li><a href="{{ route('designed-pages.index') }}"><i class='fa fa-list-alt'></i> <span>{{ trans('validation.attributes.designed_pages') }}</span></a></li>
                <li class=“treeview">
                    <a href="#"><i class='fa fa-cog'></i><span>{{ trans('validation.attributes.config') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('areas.index') }}"><i class='fa fa-columns'></i><span>{{ trans('message.areas') }}</span></a></li>

                        <li><a href="{{ route('sections.index') }}"><i class='fa fa-cubes'></i><span>{{ trans('message.sections') }}</span></a></li>
                        <li><a href="{{ route('models.index') }}"><i class='fa fa-file-image-o'></i><span>{{ trans('message.models') }}</span></a></li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->isA('secretary', 'admin'))
                <li class="treeview">
                    <a href="#"><i class='fa fa-bars'></i><span>{{ trans('message.publicity') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('ads.index') }}"><i class='fa fa-calendar'></i>{{ trans('message.advertising') }}</a></li>
                        <li><a href="{{ route('clients.index') }}"><i class='fa fa-users'></i>{{ trans('message.clients') }}</a></li>
                        <li><a href="{{ route('sizes.index') }}"><i class='fa fa-arrows-alt'></i>{{ trans('message.sizes') }}</a></li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->isA('owner', 'admin'))
                <li><a href="{{ route('reports.index') }}"><i class='fa fa-bar-chart'></i> <span>{{ trans('validation.attributes.reports') }}</span></a></li>
            @endif
            @if (Auth::user()->isA('review-manager', 'admin'))
                <li><a href="{{ route('reviewing-notes.index') }}"><i class='fa fa-files-o'></i> <span>{{ trans('validation.attributes.review_notes') }}</span></a></li>
            @endif
            @if (Auth::user()->isA('photographer', 'admin'))
                <li><a href="{{ route('photo-pages.index') }}"><i class='fa fa-camera'></i> <span>{{ trans('validation.attributes.pages_need_photo') }}</span></a></li>
            @endif
            @if (Auth::user()->isA('designer', 'admin'))
                <li><a href="{{ route('ready-pages-to-design.index') }}"><i class='fa fa-newspaper-o'></i> <span>{{ trans('validation.attributes.pages_to_design') }}</span></a></li>
                <li><a href="{{ route('reviewed-pages.index') }}"><i class='fa fa-print'></i> <span>{{ trans('validation.attributes.reviewed_pages') }}</span></a></li>
            @endif
            @if (Auth::user()->isA('admin'))
                <li><a href="/register"><i class='fa fa-user-plus'></i> <span>{{ trans('validation.attributes.register_user') }}</span></a></li>
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
