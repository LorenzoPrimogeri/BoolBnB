/* function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function (event) {
        textbox.addEventListener(event, function () {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
        });
    });
}
setInputFilter(document.getElementById("uintTextBox"), function (value) {
    return /^\d*$/.test(value);
}); */
/* $("#uintTextBox").inputFilter(function (value) {
    return /^\d*$/.test(value);
}, "Must be an unsigned integer");
$("#currencyTextBox").inputFilter(function (value) {
    return /^-?\d*[.,]?\d{0,2}$/.test(value);
}, "Must be a currency value"); */
$(document).ready(function () {
    $('.onlynumber').keypress(function (e) {
        var charCode = (e.which) ? e.which : event.keyCode
        if (String.fromCharCode(charCode).match(/[^0-9]/g))
            return false;
    });
});
/* $(document).ready(function () {
    $("#validate-reg").validate({
        rules: {
            name: {
                required: true,
                minlength: 3
            },

            email: {
                required: true,
                email: true
            },

        },
        messages: {
            name: {
                minlength: "Name should be at least 3 characters"
            },
            email: {
                email: "The email should be in the format: abc@domain.tld"
            },
        }
    });
}); */
