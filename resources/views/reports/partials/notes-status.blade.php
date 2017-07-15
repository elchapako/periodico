<section class="col-lg-6 connectedSortable">
    <div class="nav-tabs-custom">
        <div class="panel-heading">Estado de Noticias
            @if($notes)
                @include('reports.partials.table-notes')
            @else
                <p>No existen Noticias</p>
            @endif
        </div>
    </div>
</section>