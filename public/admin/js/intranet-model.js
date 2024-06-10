class IntranetModel {

    constructor(token) {
        this.token = token;
    }

    obtenerModulos = () => {
        return $.ajax({
            url: route("panel.configuraciones.modulos.modulos-visibles"),
            type: "GET",
            dataType: "JSON",
            data: { _token: this.token },
        });
    }

}
