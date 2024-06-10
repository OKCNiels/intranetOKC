class IncidenciaView {

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
                const $select = $('#tabla-data_length');
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
                $select.find('label').addClass('select2-sm');
                $('.select2').select2();
            },
            drawCallback: function (settings) {
                $('#tabla-data_filter input').prop('disabled', false);
                $('#btnBuscar').html('<i class="fa fa-search"></i>').prop('disabled', false);
                $('#tabla-data_filter input').trigger('focus');
            },
            order: [[0, 'asc']],
            ajax: {
                url: route('control.incidencias.listar'),
                method: 'POST',
                headers: {'X-CSRF-TOKEN': csrf_token}
            },
            columns: [
                {
                    render: function (data, type, row, index) {
                        return index.row + 1;
                    }, orderable: false, searchable: false, className: 'text-center'
                },
                {data: 'responsable_id', className: 'text-center'},
                {data: 'fecha', className: 'text-center'},
                {data: 'division_id', className: 'text-center'},
                {data: 'sede_id', className: 'text-center'},
                {data: 'grupo_id', className: 'text-center'},
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
        // $('#tabla-data').on("click", 'button.nuevo', (e) => {
        //     let id =$(e.currentTarget).attr('data-id'),
        //         tipo ="Editar",
        //         form = $('<form action="'+route('control.incidencias.formulario')+'" method="POST">'+
        //             '<input type="hidden" name="_token" value="'+csrf_token+'" >'+
        //             '<input type="hidden" name="id" value="'+id+'" >'+
        //             '<input type="hidden" name="tipo" value="'+tipo+'" >'+
        //         '</form>');
        //     $('body').append(form);
        //     form.submit();
        // });
        $('#nuevo').click(function (e) {
            e.preventDefault();
            let tipo ="Nueva",
                form = $('<form action="'+route('control.incidencias.formulario')+'" method="POST">'+
                    '<input type="hidden" name="_token" value="'+csrf_token+'" >'+
                    '<input type="hidden" name="id" value="0" >'+
                    '<input type="hidden" name="tipo" value="'+tipo+'" >'+
                '</form>');
            $('body').append(form);
            form.submit();

        });
        $('#tabla-data').on("click", 'button.editar', (e) => {
            let id =$(e.currentTarget).attr('data-id'),
                tipo ="Editar",
                form = $('<form action="'+route('control.incidencias.formulario')+'" method="POST">'+
                    '<input type="hidden" name="_token" value="'+csrf_token+'" >'+
                    '<input type="hidden" name="id" value="'+id+'" >'+
                    '<input type="hidden" name="tipo" value="'+tipo+'" >'+
                '</form>');
            $('body').append(form);
            form.submit();
        });

        $('#guardar').on("submit", (e) => {
            e.preventDefault();
            let data = $(e.currentTarget).serialize();
            let modelo = this.model;


            Swal.fire({
                title: 'Are you sure?',
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
                            console.log(result.value);
                            location.href = route("control.incidencias.lista")
                        }
                    })

                }
            })
        });

        $('#tabla-data').on("click", 'button.eliminar', (e) => {
            let id = $(e.currentTarget).attr('data-id');
            let modelo = this.model;
            Swal.fire({
                title: 'Are you sure?',
                text: "¿Está seguro de guardar?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Si, guardar!',
                cancelButtonText: 'No, cancelar!',
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
                            console.log(result.value);
                            location.href = route("control.incidencias.lista")
                        }
                    })

                }
            })
        });

        $('[name="empresa_id"]').on("change", (e) => {
            e.preventDefault();
            let id = $(e.currentTarget).val();
            let modelo = this.model;
            let html = '';
            modelo.listaSedesCombo(id).then((respuesta) => {

                if (respuesta.success===true) {
                    $.each(respuesta.data, function (index, element) {
                        html+='<option value="'+element.id_sede+'">'+element.descripcion+'</option>';

                    });
                }
                $('[name="sede_id"].select2').select2('destroy');
                $('[name="sede_id"]').removeAttr('disabled');
                $('[name="sede_id"]').html(html);
                $('[name="sede_id"]').select2();
                $('[name="sede_id"].select2').select2({
                    minimumResultsForSearch: Infinity,
                    width: '100%'
                });
            }).fail((respuesta) => {
                console.log(respuesta);
            }).always(() => {
            });

        });

        $('[name="grupo_id"]').on("change", (e) => {
            e.preventDefault();
            let id = $(e.currentTarget).val();
            let modelo = this.model;
            let html = '';
            modelo.listaDivisionesCombo(id).then((respuesta) => {

                if (respuesta.success===true) {
                    $.each(respuesta.data, function (index, element) {
                        html+='<option value="'+element.id_sede+'">'+element.descripcion+'</option>';

                    });
                }
                $('[name="division_id"].select2').select2('destroy');
                $('[name="division_id"]').removeAttr('disabled');
                $('[name="division_id"]').html(html);
                $('[name="division_id"]').select2();
                $('[name="division_id"].select2').select2({
                    minimumResultsForSearch: Infinity,
                    width: '100%'
                });
            }).fail((respuesta) => {
                console.log(respuesta);
            }).always(() => {
            });

        });
    }
}



