@extends('admin.admin')
@section('titulo')Calendario @endsection
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Calendario</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{explode('/',Request::path())[1]}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{explode('/',Request::path())[2]}}</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <!-- Row -->
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-status bg-blue br-te-7 br-ts-7"></div>
                <div class="card-header">
                    <h3 class="card-title">GESTION DE EVENTOS</h3>
                    {{-- <div class="card-options">
                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                        <a href="javascript:void(0)" class="card-options-remove" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div> --}}
                </div>
                <div class="card-body">
                    <div class="row">
                        {{-- <div class="col-md-3">
                            <div id="external-events">
                                <h4>Draggable Events</h4>
                                <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-primary">
                                    <div class="fc-event-main">My Event 1</div>
                                </div>
                                <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-secondary" data-class="bg-secondary">
                                    <div class="fc-event-main">My Event 2</div>
                                </div>
                                <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-warning" data-class="bg-warning">
                                    <div class="fc-event-main">My Event 3</div>
                                </div>
                                <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-success" data-class=" bg-info">
                                    <div class="fc-event-main">My Event 4</div>
                                </div>
                                <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-danger" data-class="bg-danger">
                                    <div class="fc-event-main">My Event 5</div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <h4 class="card-title mb-4">My Schedules</h4>
                                <div class="card border p-0 pt-3">
                                    <div class="card-body pt-3">
                                        <div class="dropdown">
                                            <a class="nav-link float-end text-muted pe-0 pt-0" href="javascript:void(0)" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fe fe-edit me-1 d-inline-flex"></i> Schedule Date</a>
                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fe fe-trash-2 me-1 d-inline-flex"></i> Delete</a>
                                            </div>
                                        </div>
                                        <h5 class="card-title">Design Review</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">05-09-2021</h6>
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm me-3 mb-3">Urgent</a>
                                        <a href="javascript:void(0)" class="btn btn-secondary btn-sm mb-3">Face to Face</a>
                                    </div>
                                    <div class="card-footer">
                                        <div class="media media-xs overflow-visible">
                                            <img class="avatar brround avatar-md me-3" src="../assets/images/users/12.jpg" alt="avatar-img">
                                            <div class="media-body valign-middle">
                                                <a href="profile.html" class=" fw-semibold text-dark">John Paige</a><br>
                                                <a href="profile.html" class="text-muted mb-0"> View client profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border p-0 pt-3">
                                    <div class="card-body pt-3">
                                        <div class="dropdown pe-0 pt-0">
                                            <a class="nav-link float-end text-muted" href="javascript:void(0)" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fe fe-edit me-1 d-inline-flex"></i> Schedule Date</a>
                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fe fe-trash-2 me-1 d-inline-flex"></i> Delete</a>
                                            </div>
                                        </div>
                                        <h5 class="card-title">New Project</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">14-10-2021</h6>
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm me-3 mb-3">Urgent</a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm mb-3">Online Meeting</a>
                                    </div>
                                    <div class="card-footer">
                                        <div class="media media-xs overflow-visible">
                                            <img class="avatar brround avatar-md me-3" src="../assets/images/users/16.jpg" alt="avatar-img">
                                            <div class="media-body valign-middle">
                                                <a href="profile.html" class=" fw-semibold text-dark">Mozelle Belt</a><br>
                                                <a href="profile.html" class="text-muted mb-0"> View client profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-md-12">
                            <div id='calendario-eventos'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL EFFECTS -->
    <div class="modal fade " id="modal-eventos">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Crear Evento</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="" id="guardar-evento" enctype="multipart/formdata">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" value="0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group select2-sm">
                                    <label class="form-label">Tipos de eventos  <span class="text-red">*</span></label>
                                    <select name="tipo_evento_id" class="form-control form-select form-select-sm select2" required>
                                        <option value="">Seleccione...</option>
                                        @foreach ($tipo_eventos as $item)
                                        <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Titulo <span class="text-red">*</span></label>
                                    <input type="text" name="titulo" class="form-control form-control-sm" placeholder="Ingresa el titulo del evento" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Hora-inicio <span class="text-red">*</span></label>
                                    <input type="time" name="hora_inicio" class="form-control form-control-sm" placeholder="Ingresa el titulo del evento" aria-label="Search" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Hora-final <span class="text-red">*</span></label>
                                    <input type="time" name="hora_final" class="form-control form-control-sm" placeholder="Ingresa el titulo del evento" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Fecha-inicio <span class="text-red">*</span></label>
                                    <input type="date" name="fecha_inicio" class="form-control form-control-sm" placeholder="Ingresa el titulo del evento" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Fecha-final <span class="text-red">*</span></label>
                                    <input type="date" name="fecha_final" class="form-control form-control-sm" placeholder="Ingresa el titulo del evento" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Descripcion <span class="text-red">*</span></label>
                                    <textarea class="form-control mb-4" name="descripcion" placeholder="Textarea" rows="8" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Imagen <span class="text-red">*</span></label>
                                    <input type="file" name="imagen" class="dropify" data-default-file="" data-bs-height="180">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Guardar</button> <button class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <!-- FULL CALENDAR JS -->
    <script src="{{ asset('assets/plugins/fullcalendar/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/fullcalendar/fullcalendar.min.js') }}"></script>

    <!-- FILE UPLOADES JS -->
    <script src="{{ asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>

    <script src="{{ asset('admin/js/Intranet/Calendario/calendario-model.js') }}"></script>
    <script src="{{ asset('admin/js/Intranet/Calendario/calendario-view.js') }}"></script>
    <script>
        const calendarioview = new calendarioView(new calendarioModel(csrf_token));
        calendarioview.calendario();
        calendarioview.eventos();


    </script>
@endsection
