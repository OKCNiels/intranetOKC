class VotacionModel {

    constructor(token) {
        this.token = token;
    }

    guardarModulo = (data) => {
        return $.ajax({
            url: route("panel.configuraciones.menus.guardar"),
            type: "POST",
            dataType: "JSON",
            // processData: false,
            // contentType: false,
            data: data,
        });
    }

    eliminarModulo = (id) => {
        return $.ajax({
            url: route("panel.configuraciones.menus.eliminar", {id: id}),
            type: "PUT",
            dataType: "JSON",
            data: { _token: this.token },
        });
    }
    votacion = (data) => {
        return $.ajax({
            url: route("recursos-humanos.votaciones.votacion"),
            type: "POST",
            dataType: "JSON",
            // processData: false,
            // contentType: false,
            data: data,
        });
    }

}
