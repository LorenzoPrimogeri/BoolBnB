// Wait for the DOM to be ready

// Initialize form validation on the registration form.
// It has the name attribute "registration"
$("document").ready(function () {
    $("form[name='form_registration']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            name: "required",
            surname: "required",
            email: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                email: true
            },
            password: {
                required: true,
                minlength: 5
            }
        },
        // Specify validation error messages
        messages: {
            name: "Inserisci un nome valido",
            surname: "Inserisci un cognome valido",
            email: "Inserisci una mail valida",
            password: {
                required: "Inserisci una password",
                minlength: "la password deve contenere minimo 5 caratteri"
            },
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });
});
