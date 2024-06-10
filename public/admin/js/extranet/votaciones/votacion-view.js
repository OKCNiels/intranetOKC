class VotacionView {

    constructor(model) {
        this.model = model;
    }

    /**
     * Listar mediante DataTables
     */
    listar = () => {
        // const $tabla = $('#tabla-data').DataTable({
        //     // dom: 'Bfrtip',
        //     pageLength: 10,
        //     language: idioma,
        //     serverSide: true,
        //     responsive: true,
        //     initComplete: function (settings, json) {
        //         const $filter = $('#tabla-data_filter');
        //         const $input = $filter.find('input');
        //         $filter.append('<button id="btnBuscar" class="btn btn-default btn-sm" type="button" style="border-bottom-left-radius: 0px;border-top-left-radius: 0px;"><i class="fa fa-search"></i></button>');
        //         $input.addClass('form-control-sm');
        //         $input.attr('style','border-bottom-right-radius: 0px;border-top-right-radius: 0px;');

        //         $input.off();
        //         $input.on('keyup', (e) => {
        //             if (e.key == 'Enter') {
        //                 $('#btnBuscar').trigger('click');
        //             }
        //         });
        //         $('#btnBuscar').on('click', (e) => {
        //             $tabla.search($input.val()).draw();
        //         });
        //     },
        //     drawCallback: function (settings) {
        //         $('#tabla-data_filter input').prop('disabled', false);
        //         $('#btnBuscar').html('<i class="fa fa-search"></i>').prop('disabled', false);
        //         $('#tabla-data_filter input').trigger('focus');
        //     },
        //     order: [[0, 'asc']],
        //     ajax: {
        //         url: route('recursos-humanos.votaciones.listar'),
        //         method: 'POST',
        //         headers: {'X-CSRF-TOKEN': csrf_token}
        //     },
        //     columns: [
        //         // {
        //         //     render: function (data, type, row, index) {
        //         //         return index.row + 1;
        //         //     }, orderable: false, searchable: false, className: 'text-center'
        //         // },
        //         {data: 'nombre', className: 'text-center'},
        //         {data: 'descripcion', className: 'text-center'},
        //         {data: 'pedioro', className: 'text-center'},
        //         {data: 'fecha_registro', className: 'text-center'},
        //         {data: 'fecha_inicio', className: 'text-center'},
        //         {data: 'fecha_final', className: 'text-center'},
        //         {data: 'accion', orderable: false, searchable: false, className: 'text-center'}
        //     ],
        //     buttons: [

        //     ]
        // });
        // $tabla.on('search.dt', function() {
        //     $('#tabla-data_filter input').attr('disabled', true);
        //     $('#btnBuscar').html('<i class="fa fa-clock-o" aria-hidden="true"></i>').prop('disabled', true);
        // });
        // $tabla.on('init.dt', function(e, settings, processing) {
        //     // $(e.currentTarget).LoadingOverlay('show', { imageAutoResize: true, progress: true, imageColor: '#3c8dbc' });
        // });
        // $tabla.on('processing.dt', function(e, settings, processing) {
        //     if (processing) {
        //         // $(e.currentTarget).LoadingOverlay('show', { imageAutoResize: true, progress: true, imageColor: '#3c8dbc' });
        //     } else {
        //         // $(e.currentTarget).LoadingOverlay("hide", true);
        //     }
        // });
    }

    eventos = () => {

        $('[data-action="ingreso"]').on("click", 'button.cedula', (e) => {
            e.preventDefault();
            let id =$(e.currentTarget).attr('data-id'),
                tipo ="Editar Modulo",
                form = $('<form action="'+route('recursos-humanos.votaciones.cedula')+'" method="POST">'+
                    '<input type="hidden" name="_token" value="'+csrf_token+'" >'+
                    '<input type="hidden" name="id" value="'+id+'" >'+
                '</form>');
            $('body').append(form);
            form.submit();
        });


        $('#form-cedula').on("submit", (e) => {
            e.preventDefault();
            let data = $(e.currentTarget).serialize();
            let modelo = this.model;

            // if( $(e.currentTarget).find('[name="candidato"]').is(':checked')) {
                Swal.fire({
                    title: 'Alert',
                    text: "Se procedara a guardar el registro",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Si, Confirmar voto',
                    cancelButtonText: 'No, Cancelar',
                    showLoaderOnConfirm: true,
                    preConfirm: (login) => {
                        return modelo.votacion(data).then((respuesta) => {
                            return respuesta
                            console.log(data);
                        }).fail((respuesta) => {
                            console.log(respuesta);
                        }).always(() => {
                        });
                    },
                    // allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (result.value.success===true) {
                            Swal.fire({
                                title: result.value.titulo,
                                text: result.value.mensaje,
                                icon: result.value.tipo,
                                showCancelButton: false,
                                // confirmButtonColor: '#3085d6',
                                // cancelButtonColor: '#d33',
                                confirmButtonText: 'Acepptar'
                                }).then((confirmar) => {
                                if (confirmar.isConfirmed) {
                                    // window.reload();
                                    location.href = route('recursos-humanos.votaciones.lista');

                                }
                            })
                        }else{
                            Swal.fire(
                                result.value.titulo,
                                result.value.mensaje,
                                result.value.tipo
                            )
                        }

                    }
                })
            // }else{
            //     Swal.fire(
            //         'Alerta',
            //         'Seleccione un candidato',
            //         'warning'
            //     )
            // }




            // Swal.fire({
            //     title: 'Alert',
            //     text: "Se procedara a guardar el registro",
            //     icon: 'info',
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     cancelButtonColor: '#d33',
            //     confirmButtonText: 'Si, Enviar',
            //     cancelButtonText: 'No, Cancelar',
            //   }).then((result) => {
            //     if (result.isConfirmed) {
            //         modelo.votacion(data).then((respuesta) => {
            //             console.log(data);
            //         }).fail((respuesta) => {
            //             console.log(respuesta);
            //         }).always(() => {
            //         });
            //     //   Swal.fire(
            //     //     'Deleted!',
            //     //     'Your file has been deleted.',
            //     //     'success'
            //     //   )
            //     }
            // })
        });

        $('[data-action="ingreso"]').on("click", 'button.conteo-votos', (e) => {
            e.preventDefault();
            let id =$(e.currentTarget).attr('data-id'),
                form = $('<form action="'+route('recursos-humanos.votaciones.conteo')+'" method="POST">'+
                    '<input type="hidden" name="_token" value="'+csrf_token+'" >'+
                    '<input type="hidden" name="id" value="'+id+'" >'+
                '</form>');
            $('body').append(form);
            form.submit();
        });

        $('.list-group').on("click", 'a.list-group-item-action', (e) => {
            // e.preventDefault();
            $(e.currentTarget).find('input[name="candidato"]').removeAttr('checked');
            $(e.currentTarget).find('input[name="candidato"]').attr('checked','true');
            $('.list-group-item').removeClass('active');
            $(e.currentTarget).addClass('active');


            console.log('click');
        });
    }

    dashboard = () =>{
        $('[data-circle="success"]').circleProgress({
            value: 1,
            size: 70,
            fill: {
                color: ["#09ad95"]
            }
        });

        $('[data-circle="warning"]').circleProgress({
            value: (VOTOS_REALIZADOS_PORCENTAJE/100),
            size: 70,
            fill: {
                color: ["#f7b731"]
            }
        });
        $('[data-circle="danger"]').circleProgress({
            value: (VOTOS_FALTANTES_PORCENTAJE/100),
            size: 70,
            fill: {
                color: ["#e82646"]
            }
        });

        $('[data-circle="info"]').circleProgress({
            value: (VOTOS_BLANCO_PORCENTAJE/100),
            size: 70,
            fill: {
                color: ["#1170e4"]
            }
        });
        $('[data-circle="primary"]').circleProgress({
            value: (VOTOS_BLANCO_PORCENTAJE/100),
            size: 70,
            fill: {
                color: ["#6c5ffc"]
            }
        });
    }

    pieChart = () => {
        $.ajax({
            type: "POST",
            url : route('recursos-humanos.votaciones.graficos'),
            data: { _token: csrf_token, valor: idVotacion},
            dataType: "JSON",
            success: function (response) {
                $('.chartPie').append('<canvas id="chartPie"></canvas>');
                var pieChart = document.getElementById('chartPie');
                var oilData = {
                    labels: response.candidatos,
                    datasets: [{
                        data: response.porcentaje,
                        backgroundColor: ['#63FF84', '#ffcd56', '#fffc42', '#ff7e61', '#FF6384', '#6384FF', '#61e7ff', '#8142ff']
                    }]
                };
                var pieChart = new Chart(pieChart, {type: 'pie', data: oilData});
            }
        }).fail( function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        });
        return false;
    }
}



