
class WebView {

    constructor(model) {
        this.model = model;
    }

    // Toma las variables de session de la computadora para dar inicio en la intranet
    sesionWindows = () => {

        this.model.sessionWindows().then((respuesta) => {
            console.log(respuesta);
        }).fail(() => {
            console.log('error');
        });


    }

    // Iniciaremos el calendario
    calendario = () => {
        var defaultTheme = getRandom(4);

        var today = new Date();

        var events = [ {
                id: "imwyx6S",
                name: "Event #3",
                description: "Lorem ipsum dolor sit amet.",
                date: today.getMonth() + 1 + "/18/" + today.getFullYear(),
                type: "event"
            }, {
                id: "9jU6g6f",
                name: "Holiday #1",
                description: "Lorem ipsum dolor sit amet.",
                date: today.getMonth() + 1 + "/10/" + today.getFullYear(),
                type: "holiday"
            }, {
                id: "0g5G6ja",
                name: "Event #1",
                description: "Lorem ipsum dolor sit amet.",
                date: [ today.getMonth() + 1 + "/2/" + today.getFullYear(), today.getMonth() + 1 + "/5/" + today.getFullYear() ],
                type: "event",
                everyYear: !0
            }, {
                id: "y2u7UaF",
                name: "Holiday #3",
                description: "Lorem ipsum dolor sit amet.",
                date: today.getMonth() + 1 + "/23/" + today.getFullYear(),
                type: "holiday"
            }, {
                id: "dsu7HUc",
                name: "Birthday #1",
                description: "Lorem ipsum dolor sit amet.",
                date: new Date(),
                type: "birthday"
            }, {
                id: "dsu7HUc",
                name: "Birthday #2",
                description: "Lorem ipsum dolor sit amet.",
                date: today.getMonth() + 1 + "/27/" + today.getFullYear(),
                type: "birthday"
            }
        ];

        var active_events = [];

        var week_date = [];

        var curAdd, curRmv;

        function getRandom(a) {
            return Math.floor(Math.random() * a);
        }
        let respuesta = [];

        this.model.calendario().then((respuesta) => {
            eventosCalendario(respuesta);
        }).fail(() => {
            console.log('error');
            eventosCalendario(respuesta);
        });


        function eventosCalendario(respuesta) {
            $("#calendario").evoCalendar({
                theme: 'Royal Navy',
                format: 'mm/dd/yyyy',
                titleFormat: "MM",
                language:"es",
                calendarEvents: respuesta
            });
        }
    }

}



