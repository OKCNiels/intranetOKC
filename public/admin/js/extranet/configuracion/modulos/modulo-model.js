class ModuloModel {

    constructor(token) {
        this.token = token;
    }

    guardarModulo = (data) => {
        return $.ajax({
            url: route("panel.configuraciones.modulos.guardar"),
            type: "POST",
            dataType: "JSON",
            // processData: false,
            // contentType: false,
            data: data,
        });
    }
    // eliminarModulo = () => {
    //     return $.ajax({
    //         url: route("panel.configuraciones.modulos.eliminar"),
    //         type: "GET",
    //         dataType: "JSON",
    //         data: { _token: this.token },
    //     });
    // }
    eliminarModulo = (id) => {
        return $.ajax({
            url: route("panel.configuraciones.modulos.eliminar", {id: id}),
            type: "PUT",
            dataType: "JSON",
            data: { _token: this.token },
        });
    }

}
