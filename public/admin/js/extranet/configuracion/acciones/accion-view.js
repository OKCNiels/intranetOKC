class AccionView {

    constructor(model) {
        this.model = model;
    }

    /**
     * Listar mediante DataTables
     */
    listar = () => {
        const $tabla = $('#tabla-data').DataTable({
            // dom: 'Bfrtip',
            pageLength: 10,
            language: idioma,
            serverSide: true,
            initComplete: function (settings, json) {
                const $filter = $('#tabla-data_filter');
                const $input = $filter.find('input');
                $filter.append('<button id="btnBuscar" class="btn btn-default btn-sm" type="button" style="border-bottom-left-radius: 0px;border-top-left-radius: 0px;"><i class="fa fa-search"></i></button>');
                $input.addClass('form-control-sm');
                $input.attr('style','border-bottom-right-radius: 0px;border-top-right-radius: 0px;');

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
                $('#tabla-data_filter input').prop('disabled', false);
                $('#btnBuscar').html('<i class="fa fa-search"></i>').prop('disabled', false);
                $('#tabla-data_filter input').trigger('focus');
            },
            order: [[0, 'asc']],
            ajax: {
                url: route('configuraciones.acciones.listar'),
                method: 'POST',
                headers: {'X-CSRF-TOKEN': csrf_token}
            },
            columns: [
                {
                    render: function (data, type, row, index) {
                        return index.row + 1;
                    }, orderable: false, searchable: false, className: 'text-center'
                },
                {data: 'nombre', className: 'text-center'},
                {data: 'descripcion', className: 'text-center'},
                {data: 'accion', orderable: false, searchable: false, className: 'text-center'}
            ],
            buttons: [

            ]
        });
        $tabla.on('search.dt', function() {
            $('#tabla-data_filter input').attr('disabled', true);
            $('#btnBuscar').html('<i class="fa fa-clock-o" aria-hidden="true"></i>').prop('disabled', true);
        });
        $tabla.on('init.dt', function(e, settings, processing) {
            // $(e.currentTarget).LoadingOverlay('show', { imageAutoResize: true, progress: true, imageColor: '#3c8dbc' });
        });
        $tabla.on('processing.dt', function(e, settings, processing) {
            if (processing) {
                // $(e.currentTarget).LoadingOverlay('show', { imageAutoResize: true, progress: true, imageColor: '#3c8dbc' });
            } else {
                // $(e.currentTarget).LoadingOverlay("hide", true);
            }
        });
    }

    eventos = () => {
        $('#nuevo').on("click", (e) => {
            $('#modal-accesos').modal('show');
            $("#guardar")[0].reset();
            $('#guardar [name=id]').val(0);
        });

        $('#guardar').on("submit", (e) => {
            e.preventDefault();
            let data = $(e.currentTarget).serialize();
            let modelo = this.model;

            Swal.fire({
                title: 'Guardar',
                text: "¿Está seguro de guardar?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Si, guardar!',
                cancelButtonText: 'No, cancelar!',
                allowOutsideClick: false,
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    return modelo.guardar(data).then((respuesta) => {
                        return respuesta;
                        // swal(respuesta.titulo, respuesta.mensaje, respuesta.tipo)
                    }).fail((respuesta) => {
                        console.log(respuesta);
                    }).always(() => {
                    });
                },
                // allowOutsideClick: () => !Swal.isLoading()
              }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: result.value.titulo,
                        text: result.value.mensaje,
                        icon: result.value.tipo,
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Aceptar'
                      }).then((resultado) => {
                        if (resultado.isConfirmed) {
                            $('#modal-accesos').modal('hide');
                            $('#tabla-data').DataTable().ajax.reload(null, false);
                        }
                    })

                }
            })
        });

        $('#tabla-data').on("click", 'button.editar', (e) => {
            let id =$(e.currentTarget).attr('data-id');
            let form = $("#guardar");
            $('#modal-accesos').modal('show');
            form[0].reset();
            form.find('[name=id]').val(id);

            this.model.editar(id).then((respuesta) => {

                if (respuesta.success==true) {
                    console.log(respuesta);
                    form.find('[name="nombre"]').val(respuesta.data.nombre);
                    form.find('[name="descripcion"]').val(respuesta.data.descripcion);
                }
            }).fail((respuesta) => {
                console.log(respuesta);
            }).always((respuesta) => {
                console.log(respuesta);
            });
        });

        $('#tabla-data').on("click", 'button.eliminar', (e) => {
            let id = $(e.currentTarget).attr('data-id');
            let modelo = this.model;

            Swal.fire({
                title: 'Alert',
                text: "¿Está seguro de eliminar este registro?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'No, Cancelar!',
                allowOutsideClick: false,
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    return modelo.eliminar(id).then((respuesta) => {
                        return respuesta;
                        // swal(respuesta.titulo, respuesta.mensaje, respuesta.tipo)
                    }).fail((respuesta) => {
                        console.log(respuesta);
                    }).always(() => {
                    });
                },
                // allowOutsideClick: () => !Swal.isLoading()
              }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: result.value.titulo,
                        text: result.value.mensaje,
                        icon: result.value.tipo,
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Aceptar'
                      }).then((resultado) => {
                        if (resultado.isConfirmed) {
                            $('#modal-accesos').modal('hide');
                            $('#tabla-data').DataTable().ajax.reload(null, false);
                        }
                    })

                }
            })
        });
    }
}



