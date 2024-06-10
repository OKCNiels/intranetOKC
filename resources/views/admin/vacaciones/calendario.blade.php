@extends('admin.admin')

@section('titulo') Extranet - Vacaciones @endsection

@section('css')

<style>
</style>
@endsection


@section('content')
<div class="page-header">
    <h1 class="page-title">Gestion de Vacaciones</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Recursos humanos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Vacaciones</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
                    <div id='calendar2'></div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade effect-flip-vertical" id="modal-vacaciones" tabindex="-1" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Body
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)

</script>

@endsection

@section('scripts')
    {{-- <script src="{{ asset('template/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('template/plugins/select2/i18n/es.js') }}"></script> --}}

    <!-- FULL CALENDAR JS -->
    <script src='{{ asset('template/plugins/fullcalendar/moment.min.js') }}'></script>
    <script src='{{ asset('template/plugins/fullcalendar/fullcalendar.min.js') }}'></script>
    <script src='{{ asset('template/plugins/fullcalendar/locales.min.js') }}'></script>

    <script src="{{ asset('admin/js/extranet/vacaciones/vacaciones-model.js') }}"></script>
    <script src="{{ asset('admin/js/extranet/vacaciones/vacaciones-view.js') }}"></script>
    <script>
        $(document).ready(function() {
            const view = new VacacionesView(new VacacionesModel(csrf_token));
            view.listar();
            // view.eventos();

        });
    </script>
    @endsection
