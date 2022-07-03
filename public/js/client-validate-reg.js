
const usernameEl = document.querySelector('#name');
console.log(usernameEl);
const surnameEl = document.querySelector('#surname');
const emailEl = document.querySelector('#email');
/*
const passwordEl = document.querySelector('#password');
const confirmPasswordEl = document.querySelector('#confirm-password'); */
const form = document.querySelector('#validate-reg');

function checkUsername() {
    let valid = false;
    const min = 3,
        max = 25;
    const username = usernameEl.value.trim();

    if (!isRequired(username)) {
        showError(usernameEl, 'il Nome non può essere vuoto.');
    } else if (!isBetween(username.length, min, max)) {
        showError(usernameEl, `il Nome deve essere compreso tra ${min} e ${max} caratteri.`);
    } else {
        showSuccess(usernameEl);
        valid = true;
    }
    return valid;

};
function checkSurname() {
    let valid = false;
    const min = 3,
        max = 25;
    const surname = surnameEl.value.trim();

    if (!isRequired(surname)) {
        showError(surnameEl, 'il Cognome non può essere vuoto.');
    } else if (!isBetween(surname.length, min, max)) {
        showError(surnameEl, `il Cognome deve essere compreso tra ${min} e ${max} caratteri.`)
    } else {
        showSuccess(surnameEl);
        valid = true;
    }
    return valid;

};

function checkEmail() {
    let valid = false;
    const email = emailEl.value.trim();
    if (!isRequired(email)) {
        showError(emailEl, 'Email non può essere vuoto.');
    } else if (!isEmailValid(email)) {
        showError(emailEl, 'Email non è valida.')
    } else {
        showSuccess(emailEl);
        valid = true;
    }
    return valid;
};
/*
const checkPassword = () => {
    let valid = false;

    const password = passwordEl.value.trim();

    if (!isRequired(password)) {
        showError(passwordEl, 'Password cannot be blank.');
    } else if (!isPasswordSecure(password)) {
        showError(passwordEl, 'Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)');
    } else {
        showSuccess(passwordEl);
        valid = true;
    }

    return valid;
};

const checkConfirmPassword = () => {
    let valid = false;
    // check confirm password
    const confirmPassword = confirmPasswordEl.value.trim();
    const password = passwordEl.value.trim();

    if (!isRequired(confirmPassword)) {
        showError(confirmPasswordEl, 'Please enter the password again');
    } else if (password !== confirmPassword) {
        showError(confirmPasswordEl, 'The password does not match');
    } else {
        showSuccess(confirmPasswordEl);
        valid = true;
    }

    return valid;
}; */

const isEmailValid = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};
/*
const isPasswordSecure = (password) => {
    const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    return re.test(password);
}; */

const isRequired = value => value === '' ? false : true;
const isBetween = (length, min, max) => length < min || length > max ? false : true;

function showError(input, message) {
    // get the form-field element
    const formField = input.parentElement;
    // add the error class
    formField.classList.remove('success');
    formField.classList.add('error');

    // show the error message
    const error = formField.querySelector('small');
    error.textContent = message;
};

function showSuccess(input) {
    // get the form-field element
    const formField = input.parentElement;

    // remove the error class
    formField.classList.remove('error');
    formField.classList.add('success');

    // hide the error message
    const error = formField.querySelector('small');
    error.textContent = '';
}

form.addEventListener('submit', function (e) {
    // prevent the form from submitting
    /* e.preventDefault(); */

    // validate fields
    let isUsernameValid = checkUsername(),
        isSurnameValid = checkSurname()
    isEmailValid = checkEmail()
         /*
        isPasswordValid = checkPassword(),
        isConfirmPasswordValid = checkConfirmPassword() */;

    let isFormValid = isUsernameValid &&
        isSurnameValid &&
        isEmailValid
        /*
        isPasswordValid &&
        isConfirmPasswordValid */;

    // submit to the server if the form is valid
    if (isFormValid) {

    }
});

function debounce(fn, delay = 500) {
    let timeoutId;
    return (...args) => {
        // cancel the previous timer
        if (timeoutId) {
            clearTimeout(timeoutId);
        }
        // setup a new timer
        timeoutId = setTimeout(() => {
            fn.apply(null, args)
        }, delay);
    };
};

form.addEventListener('input', debounce(function (e) {
    switch (e.target.id) {
        case 'name':
            checkUsername();
            break;
        case 'surname':
            checkSurname();
            break;
        case 'email':
            checkEmail();
            break;
        /*
    case 'password':
        checkPassword();
        break;
    case 'confirm-password':
        checkConfirmPassword();
        break; */
    }
}));

