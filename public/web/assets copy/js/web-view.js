
class WebView {

    constructor(model) {
        this.model = model;
    }

    sesionWindows = () => {

        this.model.sessionWindows().then((respuesta) => {
            console.log(respuesta);
        }).fail(() => {
            console.log('error');
        });


    }
}



