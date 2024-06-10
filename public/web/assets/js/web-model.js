class WebModel {

    constructor(token) {
        this.token = token;
    }

    sessionWindows = () => {
        return $.ajax({
            url: route('script.sesionwindows'),
            type: "GET",
            dataType: "JSON",
            data: { _token: this.token },
        });
    }

    calendario = () => {
        return $.ajax({
            url: route('calendario'),
            type: "GET",
            dataType: "JSON",
            data: { _token: this.token },
        });
    }

}
