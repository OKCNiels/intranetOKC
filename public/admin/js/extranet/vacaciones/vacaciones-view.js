class VacacionesView {

    constructor(model) {
        this.model = model;
    }

    /**
     * Listar mediante DataTables
     */
    listar = () => {
        var calendarEl = document.getElementById('calendar2');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },

                // defaultView: 'month',
                locale: 'es',
                navLinks: true, // can click day/week names to navigate views
                businessHours: true, // display business hours
                editable: true,
                selectable: true,
                selectMirror: true,
                droppable: true, // this allows things to be dropped onto the calendar

                select: function(arg) {
                    $('#modal-vacaciones').modal('show');
                    console.log(arg);
                    var title = prompt('Event Title:');
                    if (title) {
                        calendar.addEvent({
                            title: title,
                            start: arg.start,
                            end: arg.end,
                            rendering: 'background',
                            color: 'rgba(0, 206, 255, 44%)',
                        })
                    }
                    calendar.unselect()
                },
                eventClick: function(arg) {

                    if (confirm('Are you sure you want to delete this event?')) {
                        arg.event.remove()
                    }
                },
                editable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: []
            });

        calendar.render();

        // [
        //     {
        //         title: 'Business Lunch',
        //         start: '2023-09-09T13:00:00',
        //         constraint: 'businessHours'
        //     }, {
        //         title: 'Meeting',
        //         start: '2023-09-13T11:00:00',
        //         constraint: 'availableForMeeting', // defined below
        //         color: '#f35e90'
        //     }, {
        //         title: 'Conference',
        //         start: '2023-07-18',
        //         end: '2023-07-20',
        //         color: '#e67e22'
        //     }, {
        //         title: 'Party',
        //         start: '2023-07-29T20:00:00',
        //         color: '#22c865'
        //     },
        //     // areas where "Meeting" must be dropped
        //     {
        //         id: 'availableForMeeting',
        //         start: '2023-09-11T10:00:00',
        //         end: '2023-09-11T16:00:00',
        //         // rendering: 'background',
        //         // color: '#5e72e4'
        //     }, {
        //         id: 'availableForMeeting',
        //         start: '2023-09-13T10:00:00',
        //         end: '2023-09-15T16:00:00',
        //         rendering: 'background'
        //     },
        //     // red areas where no events can be dropped
        //     {
        //         start: '2023-09-24',
        //         end: '2023-09-28',
        //         overlap: true,
        //         rendering: 'background',
        //         color: 'rgba(0,0,0,0.1)'
        //     }, {
        //         start: '2023-09-06',
        //         end: '2023-09-11',
        //         overlap: false,
        //         rendering: 'background',
        //         // color: 'rgba(0,255,153,0.44)'
        //         color: 'rgba(0, 206, 255, 44%)'
        //     }
        // ]

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



