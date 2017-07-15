 <!-- Left col -->
    <section class="col-lg-6" connectedSortable>
        <div class="nav-tabs-custom">
            @if($activeEdition)
            <div class="panel-heading">Número de Edicion: {{ $activeEdition->number_of_edition }} - Fecha en desarrollo: {{ $activeEdition->publish_date }}
                    @include('reports.partials.table-pages')
                @else
                    <p>No existe Edición Activa</p>
            </div>
            @endif
        </div>
    </section>