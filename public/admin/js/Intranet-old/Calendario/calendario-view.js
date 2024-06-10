class calendarioView {

    constructor(model) {
        this.model = model;
    }

    /**
     * Inicializa el calendario
     */

    calendario (){

        // var calendarEl = document.getElementById('calendar2');

        // var calendar = new FullCalendar.Calendar(calendarEl, {

        //     headerToolbar: {
        //         left: 'prev,next today',
        //         center: 'title',
        //         right: 'dayGridMonth,timeGridWeek,timeGridDay'
        //     },
        //     locale: 'es',
        //     timeZone: 'local',
        //     initialDate: new Date(),
        //     navLinks: true,
        //     selectable: true,
        //     selectMirror: true,
        //     editable: true,
        //     dayMaxEvents: true,

        //     select: function(arg) {
        //         $('#evento').modal('show');
        //         $('#eventoCalednario')[0].reset();
        //         $('#evento #eventoTitulo').text('Nuevo Evento');
        //         $('#eventoCalednario').find('[name="fecha_inicio"]').val(arg.startStr);
        //         $('#eventoCalednario').find('[name="fecha_final"]').val(arg.startStr);
        //         $('.evento-eliminar').addClass('d-none');
        //     },
        //     eventClick: function({el,event,jsEvent,view}) {
        //         $('#evento').modal('show');
        //         $('#eventoCalednario')[0].reset();
        //         $('#evento #eventoTitulo').text('Editar Evento');
        //         $('.evento-eliminar').removeClass('d-none');
        //         $.ajax({
        //             url: route("publicidad.calendario.editar"),
        //             type: "GET",
        //             dataType: "JSON",
        //             data: {
        //                 _token: csrf_token,
        //                 id:event.id
        //             },
        //         }).done(function(response) {
        //             $('#eventoCalednario').find('[name="id"]').val(response.data.id);
        //             $('#eventoCalednario').find('[name="tipo_evento_id"]').val(response.data.tipo_evento_id);
        //             $('#eventoCalednario').find('[name="titulo"]').val(response.data.titulo);
        //             $('#eventoCalednario').find('[name="descripcion"]').val(response.data.descripcion);
        //             // $('#eventoCalednario').find('[name="imagen"]').val(response.data.imagen);
        //             $('#eventoCalednario').find('[name="fecha_inicio"]').val(response.data.fecha_inicio);
        //             $('#eventoCalednario').find('[name="fecha_final"]').val(response.data.fecha_final);
        //             $('#eventoCalednario').find('[name="hora_inicio"]').val(response.data.hora_inicio);
        //             $('#eventoCalednario').find('[name="hora_final"]').val(response.data.hora_final);

        //         }).fail( function( jqXHR, textStatus, errorThrown ){
        //             console.log(jqXHR);
        //             console.log(textStatus);
        //             console.log(errorThrown);
        //         });
        //     },
        //     eventDrop: function(arg){

        //         let fecha_inicio = arg.event.startStr.split('T')[0],
        //             fecha_final = (arg.event.endStr? arg.event.endStr.split('T')[0] :arg.event.startStr.split('T')[0]),
        //             id = arg.event.id;
        //         $.ajax({
        //             url: route("publicidad.calendario.mover"),
        //             type: "POST",
        //             dataType: "JSON",
        //             data: {
        //                 _token: csrf_token,
        //                 fecha_inicio: fecha_inicio,
        //                 fecha_final: fecha_final,
        //                 id:id
        //             },
        //         }).fail( function( jqXHR, textStatus, errorThrown ){
        //             console.log(jqXHR);
        //             console.log(textStatus);
        //             console.log(errorThrown);
        //         });

        //     },
        //     events:route("publicidad.calendario.listar")
        // });

        // calendar.render();


        var calendarEl = document.getElementById('calendario-eventos');

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
                // var title = prompt('Event Title:');
                $('#modal-eventos').modal('show');
                $('#modal-eventos').addClass("effect-flip-vertical");
                $('#modal-eventos').find('.modal-title').text('Nuevo Evento');
                $('#guardar-evento')[0].reset();

                $('#guardar-evento').find('[name="tipo_evento_id"]').val(null).trigger('change');
                $('#guardar-evento').find('[name="id"]').val(0);
                $('#guardar-evento').find('[name="fecha_inicio"]').val(arg.startStr);
                $('#guardar-evento').find('[name="fecha_final"]').val(arg.endStr);

                $('#guardar-evento').find('[name="imagen"]').removeAttr('data-default-file');
                $('.dropify-preview').removeAttr('style');
                // $('.dropify-preview').find('span.dropify-render').removeAttr('img');
                // if (title) {
                //     calendar.addEvent({
                //         title: title,
                //         start: arg.start,
                //         end: arg.end,
                //         allDay: arg.allDay
                //     })
                // }
                calendar.unselect();
            },
            eventClick: function(arg) {
                $('#modal-eventos').modal('show');
                $('#modal-eventos').addClass("effect-flip-vertical");
                $('#modal-eventos').find('.modal-title').text('Editar Evento');
                $('#guardar-evento')[0].reset();

                $.ajax({
                    url: route("panel.publicidades.calendario.editar"),
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        _token: csrf_token,
                        id:arg.event.id
                    },
                }).done(function(response) {
                    $('#guardar-evento').find('[name="id"]').val(response.data.id);
                    $('#guardar-evento').find('[name="tipo_evento_id"]').val(response.data.tipo_evento_id).trigger('change');
                    $('#guardar-evento').find('[name="titulo"]').val(response.data.titulo);
                    $('#guardar-evento').find('[name="descripcion"]').val(response.data.descripcion);
                    $('#guardar-evento').find('[name="fecha_inicio"]').val(response.data.fecha_inicio);
                    $('#guardar-evento').find('[name="fecha_final"]').val(response.data.fecha_final);
                    $('#guardar-evento').find('[name="hora_inicio"]').val(response.data.hora_inicio);
                    $('#guardar-evento').find('[name="hora_final"]').val(response.data.hora_final);
                    $('#guardar-evento').find('[name="imagen"]').attr('data-default-file',response.data.imagen);
                    $('.dropify-preview').attr('style','display: block;');
                    $('.dropify-preview').find('span.dropify-render').html('<img src="'+response.data.imagen+'">');

                }).fail( function( jqXHR, textStatus, errorThrown ){
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                });
            },
            eventDrop: function(arg){
                let fecha_inicio = arg.event.startStr.split('T')[0],
                    fecha_final = (arg.event.endStr? arg.event.endStr.split('T')[0] :arg.event.startStr.split('T')[0]),
                    id = arg.event.id;
                $.ajax({
                    url: route("panel.publicidades.calendario.mover"),
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        _token: csrf_token,
                        fecha_inicio: fecha_inicio,
                        fecha_final: fecha_final,
                        id:id
                    },
                }).fail( function( jqXHR, textStatus, errorThrown ){
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                });

            },
            editable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: route("panel.publicidades.calendario.listar"),
        });

        calendar.render();

    }

    /**
     * Se ejecutan los eventos que nacen de una accion, solo crear funcion a parte de ser necesario
     */

    eventos = () => {


        /**
         * crea un evento
         */
        $('#guardar-evento').on("submit", (e) => {
            e.preventDefault();
            const button_guardar = $(e.currentTarget).find('button[type="submit"]');
            var data = new FormData($(e.currentTarget)[0]);
            button_guardar.remove('span');
            button_guardar.attr('disabled','true');
            button_guardar.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Guardando... ');
            this.model.guardarEvento(data).then((respuesta) => {

                if (respuesta.sucess===true) {
                    $('#modal-eventos').modal('hide');

                    // this.calendario;
                }
                this.calendario();

                button_guardar.remove('span');
                button_guardar.removeAttr('disabled');
                button_guardar.html('<span class="fe fe-save"></span> Guardar Evento');

            }).fail((respuesta) => {
                button_guardar.remove('span');
                button_guardar.removeAttr('disabled');
                button_guardar.html('<span class="fe fe-save"></span> Guardar Evento');
                console.log(respuesta);
            }).always(() => {
            });
        });
    }
}



