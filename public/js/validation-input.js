const form = document.getElementById("form-validate");


$(document).ready(function () {
    $('.onlynumber').keypress(function (e) {
        var charCode = (e.which) ? e.which : event.keyCode
        if (String.fromCharCode(charCode).match(/[^0-9]/g))
            return false;
    });

    $("#form-validate").validate({
        messages: {
            title: {
                required: "Inserisci un titolo",
                minlength: "Lunghezza minima di 5 caratteri"
            },
            description: {
                required: "Inserisci una descrizione",
                minlength: "Lunghezza minima di 10 caratteri"
            },
            img: {
                required: "Inserisci un'immagine"
            },
            address: {
                required: "Inserisci un'indirizzo"
            },
            room: {
                required: "Inserisci il numero di stanze"
            },
            bathroom: {
                required: "Inserisci il numero di bagni"
            },
            bed: {
                required: "Inserisci il numero di letti"
            },
            mq: {
                required: "Inserisci i metri quadri dell'appartamento"
            },
            price: {
                required: "Inserisci il prezzo"
            }

        }
    });

});
