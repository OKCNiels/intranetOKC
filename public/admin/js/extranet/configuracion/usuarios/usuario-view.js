class UsuarioView {

    constructor(model) {
        this.model = model;
    }

    /**
     * Listar mediante DataTables
     */
    listar = () => {
        const $tabla = $('#tabla-data').DataTable({
            dom: 'Bfrtip',
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
                url: route('configuraciones.usuarios.listar'),
                method: 'POST',
                headers: {'X-CSRF-TOKEN': csrf_token}
            },
            columns: [
                {
                    render: function (data, type, row, index) {
                        return index.row + 1;
                    }, orderable: false, searchable: false, className: 'text-center'
                },
                {data: 'nombre_corto', className: 'text-center'},
                {data: 'email', className: 'text-center'},
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
        // $('#tabla-data').on("click", 'button.editar', (e) => {
        //     console.log(`ññ`);
        //     let id =$(e.currentTarget).attr('data-id'),
        //         tipo ="Editar Modulo",
        //         form = $('<form action="'+route('panel.configuraciones.modulos.formulario-modulo')+'" method="POST">'+
        //             '<input type="hidden" name="_token" value="'+csrf_token+'" >'+
        //             '<input type="hidden" name="id" value="'+id+'" >'+
        //             '<input type="hidden" name="tipo" value="'+tipo+'" >'+
        //         '</form>');
        //     $('body').append(form);
        //     form.submit();
        // });

        // $('#guardar').on("submit", (e) => {
        //     e.preventDefault();
        //     let data = $(e.currentTarget).serialize();
        //     let modelo = this.model;
        //     swal({
        //         title: "Alert",
        //         text: "Info alert",
        //         type: "info",
        //         showCancelButton: true,
        //         confirmButtonText: 'Si, Guardar',
        //         cancelButtonText: 'No, Cancelar',
        //         closeOnConfirm: false,
        //         showLoaderOnConfirm: true

        //     }, function () {
        //         modelo.guardarModulo(data).then((respuesta) => {
        //             swal({
        //                 title: respuesta.titulo,
        //                 text: respuesta.mensaje,
        //                 type: respuesta.tipo,
        //                 showCancelButton: true,
        //                 confirmButtonText: 'Aceptar',
        //                 cancelButtonText: 'Volver a la lista'
        //             }, function(inputValue) {
        //                 // location.reload();
        //                 if (inputValue) {
        //                     console.log('true');
        //                     location.reload();
        //                 } else {
        //                     location.href=route('panel.configuraciones.modulos.lista');
        //                     // "route('panel.configuraciones.modulos.lista')";
        //                     console.log('false');
        //                 }
        //                 // console.log(inputValue);
        //             });

        //             // swal(respuesta.titulo, respuesta.mensaje, respuesta.tipo)
        //         }).fail((respuesta) => {
        //             console.log(respuesta);
        //         }).always(() => {
        //         });
        //     });
        // });

        // $('#tabla-data').on("click", 'button.eliminar', (e) => {
        //     let id = $(e.currentTarget).attr('data-id');
        //     let modelo = this.model;
        //     swal({
        //         title: "Alert",
        //         text: "Esta seguro de eliminar este registro",
        //         type: "info",
        //         showCancelButton: true,
        //         confirmButtonText: 'Si, Eliminar',
        //         cancelButtonText: 'No, Cancelar',
        //         closeOnConfirm: false,
        //         showLoaderOnConfirm: true

        //     }, function () {
        //         modelo.eliminarModulo(id).then((respuesta) => {
        //             swal({
        //                 title: respuesta.titulo,
        //                 text: respuesta.mensaje,
        //                 type: respuesta.tipo,
        //                 showCancelButton: false,
        //                 confirmButtonText: 'Aceptar',
        //             }, function(inputValue) {
        //                 if (inputValue) {
        //                     location.reload();
        //                 } else {
        //                 }
        //             });
        //         }).fail((respuesta) => {
        //             console.log(respuesta);
        //         }).always(() => {
        //         });
        //     });
        // });
    }
}



