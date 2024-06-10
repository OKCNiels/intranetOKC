class MenuModel {

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
    // eliminarModulo = () => {
    //     return $.ajax({
    //         url: route("panel.configuraciones.menu.eliminar"),
    //         type: "GET",
    //         dataType: "JSON",
    //         data: { _token: this.token },
    //     });
    // }
    eliminarModulo = (id) => {
        return $.ajax({
            url: route("panel.configuraciones.menus.eliminar", {id: id}),
            type: "PUT",
            dataType: "JSON",
            data: { _token: this.token },
        });
    }

}
