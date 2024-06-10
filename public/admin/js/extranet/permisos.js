$(document).ready(function() {
    $(".sidebar-mini").addClass("sidenav-toggled");
    listar();

    $('.select-area').select2({
        placeholder: "Elija un área",
        allowClear: true,
        language: "es",
        width: "100%",
        dropdownParent: $('#modalRegistro')
    });

    $('.select-tipo-permiso').select2({
        placeholder: "Elija un tipo de permiso",
        allowClear: true,
        language: "es",
        width: "100%",
        dropdownParent: $('#modalRegistro')
    }).on("change", function (e) {
        cargarDetallePermisos($(this).val());
        return false;
    });

    $(".select-detalle-permiso").select2({
        placeholder: "Seleccione un tipo de solicitud",
        allowClear: true,
        language: "es",
        width: "100%",
        dropdownParent: $('#modalRegistro')
    });

    $('.select-responsable').select2({
        placeholder: "Elija un responsable",
        allowClear: true,
        language: "es",
        width: "100%",
        dropdownParent: $('#modalRegistro')
    });

    $(".select-grupo").select2({
        placeholder: "Seleccione un grupo",
        allowClear: true,
        language: "es",
        width: "100%",
        dropdownParent: $('#modalRegistro')
    }).on("change", function (e) {
        cargarAreas($(this).val());
        return false;
    });

    $("#formulario").on("submit", function(e) {
        $.ajax({
            type: "POST",
            url : route('recursos-humanos.permisos.guardar'),
            data: new FormData($(this)[0]),
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (response) {
                Util.mensaje(response.alerta, response.mensaje);
                if (response.respuesta == "ok") {
                    $('#tabla').DataTable().ajax.reload(null, false);
                    $("#modalRegistro").modal("hide");
                }
            }
        }).fail( function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        });
        return false;
    });

    $("#formulario-aprobacion").on("submit", function(e) {
        let tipo = $("[name=modalidad]").val();
        let ruta = (tipo == 1) ? route('recursos-humanos.permisos.aprobar') : route('recursos-humanos.permisos.denegar');
        $.ajax({
            type: "POST",
            url : ruta,
            data: $(this).serializeArray(),
            dataType: "JSON",
            success: function (response) {
                Util.mensaje(response.alerta, response.mensaje);
                if (response.respuesta == "ok") {
                    $('#tabla').DataTable().ajax.reload(null, false);
                    $("#modalAprobacion").modal("hide");
                }
            }
        }).fail( function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        });
        return false;
    });

    $("#formulario-sustento").on("submit", function(e) {
        $.ajax({
            type: "POST",
            url : route('recursos-humanos.permisos.guardar-sustento'),
            data: new FormData($(this)[0]),
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (response) {
                Util.mensaje(response.alerta, response.mensaje);
                if (response.respuesta == "ok") {
                    $('#tabla').DataTable().ajax.reload(null, false);
                    $("#modalSustento").modal("hide");
                }
            }
        }).fail( function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        });
        return false;
    });

    $("[name=tipo_permiso_detalle_id]").on("change", function(e) {
        let elemento = $(e.currentTarget);
        let seleccion = (elemento.find(':selected')[0]) ? elemento.find(':selected')[0].dataset.sustento : false;
        $("[name=flag_sustento]").val(seleccion);
    });

    $("[name=fecha_fin]").on("change", function (e) {
        $fechaIni = moment($("[name=fecha_inicio]").val());
        $fechaFin = moment($(this).val());
        $resultado = $fechaFin.diff($fechaIni, 'days');
        $("[name=dias]").val($resultado);
    });

    $("[name=hora_fin]").on("keyup, click, blur", function (e) {
        $hoy = moment().format("YYYY-MM-DD");
        $horaIni = $("[name=hora_inicio]").val();
        $horaFin = $(this).val();
        $fechaIni = moment($hoy + ' ' + $horaIni);
        $fechaFin = moment($hoy + ' ' + $horaFin);
        $resultado = ($fechaFin.diff($fechaIni, "minutes"));
        $resultado = ($fechaFin.diff($fechaIni, 'minutes') / 60);
        $("[name=horas]").val($resultado);
    });

    $("#imprimir").on("click", function (e) {
        if (rrhhUsuarios.includes(idUsuario)) {
            let elemento = $(e.currentTarget);
            if (elemento.data("key") > 0) {
                let form = $('<form action="' + route('recursos-humanos.permisos.imprimir') + '" method="post" target="_blank">' +
                    '<input type="hidden" name="_token" value="' + csrf_token + '" />' +
                    '<input type="hidden" name="id" value="' + elemento.data("key") + '" />' +
                '</form>');
                $('body').append(form);
                form.submit();
            } else {
                Util.mensaje('info', 'Problemas para imprimir la información, intente más tarde');
            }
        } else {
            Util.mensaje('warning', 'No tiene acceso para imprimir las solicitudes');
        }
    });
});

function listar() {
    const $tabla = $('#tabla').DataTable({
        dom: 'Bfrtip',
        pageLength: 20,
        destroy: true,
        language: idioma,
        // responsive:true,
        serverSide: true,
        initComplete: function (settings, json) {
            const $filter = $('#tabla_filter');
            const $input = $filter.find('input');
            $filter.append('<button id="btnBuscar" class="btn btn-primary pull-right" type="button"><i class="fe fe-search"></i></button>');
            $input.off();
            $input.on('keyup', (e) => {
                if (e.key == 'Enter') {
                    $('#btnBuscar').trigger('click');
                }
            });
            $('#btnBuscar').on('click', (e) => {
                $tabla.search($input.val()).draw();
            });
        },
        drawCallback: function (settings) {
            $('#tabla_filter input').prop('disabled', false);
            $('#btnBuscar').html('<i class="fe fe-search"></i>').prop('disabled', false);
            $('#tabla_filter input').trigger('focus');
        },
        ajax: {
            url: route('recursos-humanos.permisos.listar'),
            method: 'POST',
            headers: {'X-CSRF-TOKEN': csrf_token}
        },
        order: [[0, 'desc']],
        columns: [
            {data: 'fecha'},
            {data: 'datos_solicitante'},
            {data: 'tipo_solicitud'},
            {data: 'permiso'},
            {data: 'fechas_permiso', className: 'text-center'},
            {data: 'dia_hora', className: 'text-center'},
            {data: 'datos_autoriza', className: 'text-center'},
            {data: 'estado_final', orderable: false, searchable: false, className: 'text-center'},
            {data: 'accion', orderable: false, searchable: false, className: 'text-center'}
        ],
        buttons: [
            {
                text: '<i class="fe fe-plus me-1"></i> Nueva solicitud',
                action: function () {
                    $("#formulario")[0].reset();
                    $('[name=id]').val(0);
                    $('[name=flag_sustento]').val(false);
                    $(".select-detalle-permiso").empty();
                    $(".select-area").empty();
                    $(".select2").val(null).trigger('change');
                    $("#titulo").text("Registrar nueva solicitud de permiso");
                    $("#modalRegistro").modal("show");
                 },
            }
        ],
        rowCallback: function(row, data) {
            let $class = '';
            if (data.id_autoriza == idUsuario && data.estado == 'ELABORADO') {
                $class = 'flag-aprobar';
            }

            if (rrhhUsuarios.includes(idUsuario) && data.estado == 'APROBADO') {
                $class = 'flag-validar';
            }

            $(row).addClass($class);
        }
    });
    $tabla.on('search.dt', function() {
        $('#tabla_filter input').attr('disabled', true);
        $('#btnBuscar').html('<i class="fe fe-stop-circle" aria-hidden="true"></i>').prop('disabled', true);
    });
}

function cargarAreas(grupo, id = 0) {
    let row = `<option></option>`;
    $.ajax({
        type: "POST",
        url: route('recursos-humanos.helpers.listar-division'),
        data: {_token: csrf_token, valor: grupo},
        dataType: "JSON",
        success: function (response) {
            if (response.length > 0) {
                response.forEach(function(element, index) {
                    row  += `<option value="`+ element.id_division +`">`+ element.descripcion +`</option>`;
                });
            }
            $("[name=area_id]").html(row);
            $(".select-area").select2({
                placeholder: "Seleccione un área",
                allowClear: true,
                language: "es",
                width: "100%",
                dropdownParent: $('#modalRegistro')
            });

            if (id > 0) {
                $(".select-area").val(id).trigger('change');
            }
        }
    }).fail( function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    });
    return false;
}

function cargarDetallePermisos(permiso, id = 0) {
    let row = `<option></option>`;
    $.ajax({
        type: "POST",
        url: route('recursos-humanos.helpers.listar-detalle-permisos'),
        data: {_token: csrf_token, valor: permiso},
        dataType: "JSON",
        success: function (response) {
            if (response.length > 0) {
                response.forEach(function(element, index) {
                    row  += `<option value="`+ element.id +`" data-sustento="`+ element.sustento +`">`+ element.descripcion +`</option>`;
                });
            }
            $("[name=tipo_permiso_detalle_id]").html(row);
            $(".select-detalle-permiso").select2({
                placeholder: "Seleccione un tipo de solicitud",
                allowClear: true,
                language: "es",
                width: "100%",
                dropdownParent: $('#modalRegistro')
            });

            if (id > 0) {
                $(".select-detalle-permiso").val(id).trigger('change');
            }
        }
    }).fail( function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    });
    return false;
}

function aprobar(id, tipo) {
    $("#formulario-aprobacion")[0].reset();
    $("[name=id_permiso]").val(id);
    $("[name=tipo_permiso]").val(tipo);
    $("[name=modalidad]").val(1);
    $("#modalAprobacion").modal("show");
}

function denegar(id, tipo) {
    $("#formulario-aprobacion")[0].reset();
    $("[name=id_permiso]").val(id);
    $("[name=tipo_permiso]").val(tipo);
    $("[name=modalidad]").val(2);
    $("#modalAprobacion").modal("show");
}

function editar (id) {
    $.ajax({
        type: "GET",
        url : route('recursos-humanos.permisos.editar', {id: id}),
        dataType: "JSON",
        success: function (response) {
            $("[name=id]").val(response.id);
            $("[name=flag_sustento]").val(response.flag_sustento);
            $("[name=fecha]").val(response.fecha);
            $("[name=tipo_permiso_id]").val(response.tipo_permiso_detalle.tipo_permiso_id).trigger('change');
            cargarDetallePermisos(response.tipo_permiso_detalle.tipo_permiso_id, response.tipo_permiso_detalle_id);
            $("[name=responsable_id]").val(response.id_autoriza).trigger('change');
            $("[name=grupo_id]").val(response.id_grupo).trigger('change');
            cargarAreas(response.id_grupo, response.id_division);
            $("[name=fecha_inicio]").val(response.fecha_inicio);
            $("[name=fecha_fin]").val(response.fecha_fin);
            $("[name=dias]").val(response.dias);
            $("[name=hora_inicio]").val(response.hora_inicio);
            $("[name=hora_fin]").val(response.hora_fin);
            $("[name=horas]").val(response.horas);
            $("[name=detalle]").val(response.detalle);
            let linkSustento = (response.sustento != null) ? `<a href="` + urlImage + `/` + response.sustento +`" target="_blank">Ver sustento</a>` : '';
            $("#sustentoLink").html(linkSustento);
            $("#titulo").text("Editar solicitud de permiso");
            $("#modalRegistro").modal("show");
        }
    }).fail( function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    });
    return false;
}

function historial(id) {
    let $contenido = '';
    let $lista = '';

    $.ajax({
        type: "POST",
        url : route('recursos-humanos.permisos.historial'),
        data: {_token: csrf_token, id: id},
        dataType: "JSON",
        success: function (response) {
            let permiso = response.permiso;
            let historial = response.historial;
            let linkSustento = (permiso.sustento != null) ? `<a href="` + urlImage + `/` + permiso.sustento +`" target="_blank">Descargar sustento</a>` : 'No hay sustento';

            $contenido += `
            <div class="row mb-3">
                <div class="col-md-12">
                    <label class="text-primary">Solicitante:</label>
                    <p>`+ permiso.datos_solicitante +`</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="text-primary">Fecha:</label>
                    <p>`+ permiso.formato_fecha +`</p>
                </div>
                <div class="col-md-4">
                    <label class="text-primary">Tipo de permiso:</label>
                    <p>`+ permiso.tipo_permiso +`</p>
                </div>
                <div class="col-md-4">
                    <label class="text-primary">Tipo de solicitud:</label>
                    <p>`+ permiso.tipo_solicitud +`</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="text-primary">Grupo:</label>
                    <p>`+ permiso.grupo +`</p>
                </div>
                <div class="col-md-4">
                    <label class="text-primary">Area:</label>
                    <p>`+ permiso.division +`</p>
                </div>
                <div class="col-md-4">
                    <label class="text-primary">Autorizado:</label>
                    <p>`+ permiso.datos_autoriza +`</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label class="text-primary">Descripción del permiso:</label>
                    <p>`+ permiso.permiso +`</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="text-primary">Días:</label>
                            <p>`+ permiso.formato_fecha_fin + ` al ` + permiso.formato_fecha_fin + ` <strong>(` + permiso.dias + `)</strong>` + `</p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-primary">Horas:</label>
                            <p>`+ permiso.formato_hora_inicio + ` al ` + permiso.formato_hora_fin + ` <strong>(` + permiso.horas + `)</strong>` + `</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="text-primary">Adjunto:</label>
                    <p>`+ linkSustento +`</p>
                </div>
            </div>`;

            if (historial.length > 0) {
                historial.forEach(elemento => {
                    $lista += `<tr>
                        <td>`+ elemento.formato_fecha +`</td>
                        <td>`+ elemento.descripcion +`</td>
                        <td>`+ elemento.usuario.nombre_corto +`</td>
                    </tr>`
                });
            } else {
                $lista += '<tr><td colspan="3">No se encontraron resultados</td></tr>';
            }
            $("#resultado").html($contenido);
            $("#imprimir").data("key", permiso.id);
            $("#resultado-historial").html($lista);
            $("#modalHistorial").modal("show");
        }
    }).fail( function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    });
    return false;
}

function sustento(id) {
    $("#formulario-sustento")[0].reset();
    $("[name=id_permiso]").val(id);
    $("#modalSustento").modal("show");
}
