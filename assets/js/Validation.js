const ST_FNAME = document.getElementById("first_name1");
const ST_LNAME = document.getElementById("last_name1");
const ST_EMAIL = document.getElementById("email1");
const ST_IDNUM = document.getElementById("id_num1");
const ST_YEAR = document.getElementById("year_level");
const ST_PASSWORD = document.getElementById("password1");
const ST_PASSWORD_CONFIRM = document.getElementById("password_confirm1");
const ST_CREATE_FORM = document.getElementById("create-user");


ST_CREATE_FORM.addEventListener("submit", (event) => {
    event.preventDefault();
    validateStudentForm();
});

function validateStudentForm() {
    let errors = [];

    if (!inputNotEmpty(ST_FNAME)) {
        errors.push(ST_FNAME);
    } else if (!nameHasNoNumber(ST_FNAME)) {
        errors.push(ST_FNAME);
        ST_FNAME.nextElementSibling.innerHTML = "First Name should not contain numbers";
    } else {
        doNotShowError(ST_FNAME);
    }

    if (!inputNotEmpty(ST_LNAME)) {
        errors.push(ST_LNAME);
    } else if (!nameHasNoNumber(ST_LNAME)) {
        errors.push(ST_LNAME);
        ST_LNAME.nextElementSibling.innerHTML = "Last Name should not contain numbers"
    } else {
        doNotShowError(ST_LNAME);
    }

    if (!emailIsValid(ST_EMAIL)) {
        errors.push(ST_EMAIL);
        showError(ST_EMAIL, "Invalid Email");
    } else {
        doNotShowError(ST_EMAIL);
    }

    if (!inputNotEmpty(ST_IDNUM)) {
        errors.push(ST_IDNUM);
    } else if (!inputIsNumber(ST_IDNUM)) {
        errors.push(ST_IDNUM);
        showError(ST_IDNUM, "ID Number should be a number");
    } else {
        doNotShowError(ST_IDNUM);
    }

    if (ST_YEAR.value === 'Please select...') {
        errors.push(ST_YEAR);
        showError(ST_YEAR, "No year level selected");
    }
    else {
        doNotShowError(ST_YEAR)
    }

    if (!inputNotEmpty(ST_PASSWORD)) {
        errors.push(ST_PASSWORD)
    } else {
        doNotShowError(ST_PASSWORD)
    }

    if (!inputNotEmpty(ST_PASSWORD_CONFIRM)) {
        errors.push(ST_PASSWORD_CONFIRM);
    } else if (ST_PASSWORD_CONFIRM.value != ST_PASSWORD.value) {
        errors.push(ST_PASSWORD_CONFIRM);
        showError(ST_PASSWORD, "Password does not match!");
        showError(ST_PASSWORD_CONFIRM, "Password does not match!");
    } else {
        doNotShowError(ST_PASSWORD_CONFIRM)
    }

    if (errors.length === 0) {
        ST_CREATE_FORM.submit();
    } else {
        errors.forEach(error => {
            showError(error);
        });
    }
}

function inputNotEmpty(elem) {
    elem.nextElementSibling.innerHTML = "Field is empty!"
    return elem.value != "";
}

function showError(elem, message = null) {
    elem.style.borderColor = "red";

    let errorMsgContainer = elem.nextElementSibling;
    if (message != null) {
        errorMsgContainer.innerHTML = message;
    }
    errorMsgContainer.classList.remove("hidden");

}

function doNotShowError(elem) {
    elem.style.borderColor = "";
    let errorMsgContainer = elem.nextElementSibling;
    errorMsgContainer.classList.add("hidden");
}

function nameHasNoNumber(elem) {
    return elem.value.match(/^[a-z A-Z]*$/)
}

function emailIsValid(elem) {
    const EMAIL_REG_EXP = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
    return EMAIL_REG_EXP.test(elem.value);
}

function inputIsNumber(elem) {
    const inputValue = elem.value.trim();
    return !isNaN(inputValue) && !isNaN(parseFloat(inputValue));
}