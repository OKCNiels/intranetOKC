class calendarioLanding {

    constructor(model) {
        this.model = model;
    }

    /**
     * Inicializa el calendario
     */

    vista (){

        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {

            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            locale: 'es',
            timeZone: 'local',
            initialDate: new Date(),
            navLinks: true, // can click day/week names to navigate views
            selectable: false,
            selectMirror: false,
            editable: false,
            dayMaxEvents: true, // allow "more" link when too many events
            events:route("publicidad.calendario.listar")
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
        $('#eventoCalendario').on("submit", (e) => {
            e.preventDefault();
            const button_guardar = $(e.currentTarget).find('button[type="submit"]');
            var data = new FormData($(e.currentTarget)[0]);
            button_guardar.remove('span');
            button_guardar.attr('disabled','true');
            button_guardar.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Guardando... ');
            this.model.guardarEvento(data).then((respuesta) => {

                if (respuesta.sucess===true) {
                    $('#evento').modal('hide');
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
