class calendarioModel {

    constructor(token) {
        this.token = token;
    }

    guardarEvento = (data) => {
        return $.ajax({
            url: route("panel.publicidades.calendario.guardar"),
            type: "POST",
            dataType: "JSON",
            processData: false,
            contentType: false,
            data: data,
        });
    }
    obtenerCalendario = () => {
        return $.ajax({
            url: route("panel.publicidades.calendario.listar"),
            type: "GET",
            dataType: "JSON",
            data: { _token: this.token },
        });
    }
    // eliminarCliente = (id) => {
    //     return $.ajax({
    //         url: route("publicidad.calendario.guardar", {id: id}),
    //         type: "PUT",
    //         dataType: "JSON",
    //         data: { _token: this.token },
    //     });
    // }

}
