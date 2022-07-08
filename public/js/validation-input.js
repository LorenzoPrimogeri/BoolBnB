const form = document.getElementById("form-validate");


$(document).ready(function () {
    $('.onlynumber').keypress(function (e) {
        var charCode = (e.which) ? e.which : event.keyCode
        if (String.fromCharCode(charCode).match(/[^1-9]/g))
            return false;
    });
    /* $('#rooms').on('input', function () {
        var input = $(this);
        var is_num = input.val();
        if (is_num > 0 && is_num < 16) {
            input.removeClass("invalid").addClass("valid");
            $("span#err-rooms").addClass("d-none").removeClass("d-block");
        }
        else {
            input.removeClass("valid").addClass("invalid");
            $("span#err-rooms").addClass("d-block").removeClass("d-none");
        }
    });
    $('#baths').on('input', function () {
        var input = $(this);
        var is_num = input.val();
        if (is_num > 0 && is_num < 16) {
            input.removeClass("invalid").addClass("valid");
            $("span#err-baths").addClass("d-none").removeClass("d-block");
        }
        else {
            input.removeClass("valid").addClass("invalid");
            $("span#err-baths").addClass("d-block").removeClass("d-none");
        }
    });
    $('#beds').on('input', function () {
        var input = $(this);
        var is_num = input.val();
        if (is_num > 0 && is_num < 16) {
            input.removeClass("invalid").addClass("valid");
            $("span#err-beds").addClass("d-none").removeClass("d-block");
        }
        else {
            input.removeClass("valid").addClass("invalid");
            $("span#err-beds").addClass("d-block").removeClass("d-none");
        }
    });
    $('#mq').on('input', function () {
        var input = $(this);
        var is_num = input.val();
        if (is_num > 5 && is_num < 1001) {
            input.removeClass("invalid").addClass("valid");
            $("span#err-mq").addClass("d-none").removeClass("d-block");
        }
        else {
            input.removeClass("valid").addClass("invalid");
            $("span#err-mq").addClass("d-block").removeClass("d-none");
        }
    });
    $('#price').on('input', function () {
        var input = $(this);
        var is_num = input.val();
        if (is_num > 0 && is_num < 7001) {
            input.removeClass("invalid").addClass("valid");
            $("span#err-price").addClass("d-none").removeClass("d-block");
        }
        else {
            input.removeClass("valid").addClass("invalid");
            $("span#err-price").addClass("d-block").removeClass("d-none");
        }
    });

    $("#btn-submit").click(function (event) {
        let error_free = false;
        if ($("input#rooms").hasClass("invalid")) {
            $("span#err-rooms").addClass("d-block").removeClass("d-none");
            error_free = false;
        }
        else if ($("input#rooms").hasClass("valid")) {
            $("span#err-rooms").addClass("d-none").removeClass("d-block");
            error_free = true;
        }
        if ($("input#baths").hasClass("invalid")) {
            $("span#err-baths").addClass("d-block").removeClass("d-none");
            error_free = false;
        }
        else if ($("input#baths").hasClass("valid")) {
            $("span#err-baths").addClass("d-none").removeClass("d-block");
            error_free = true;
        }
        if ($("input#beds").hasClass("invalid")) {
            $("span#err-beds").addClass("d-block").removeClass("d-none");
            error_free = false;
        }
        else if ($("input#beds").hasClass("valid")) {
            $("span#err-beds").addClass("d-none").removeClass("d-block");
            error_free = true;
        }
        if ($("input#mq").hasClass("invalid")) {
            $("span#err-mq").addClass("d-block").removeClass("d-none");
            error_free = false;
        }
        else if ($("input#mq").hasClass("valid")) {
            $("span#err-mq").addClass("d-none").removeClass("d-block");
            error_free = true;
        }
        if ($("input#price").hasClass("invalid")) {
            $("span#err-price").addClass("d-block").removeClass("d-none");
            error_free = false;
        }
        else if ($("input#price").hasClass("valid")) {
            $("span#err-price").addClass("d-none").removeClass("d-block");
            error_free = true;
        }
        console.log(error_free);
        if (!error_free) {
            event.preventDefault();
        }
        else {
            alert('No errors: Form will be submitted');
        }
    }); */


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
