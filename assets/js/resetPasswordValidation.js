const PASSWORD = document.getElementById("password");
const PASSWORD_CONFIRM = document.getElementById("password_confirm");
const RESET_FORM = document.getElementById("reset-password");


RESET_FORM.addEventListener("submit", (event) => {
    event.preventDefault();
    validatePassword();
});

function validatePassword() {
    let errors = [];

    if (!inputNotEmpty(PASSWORD))
    {
        errors.push(PASSWORD)
    } else {
        doNotShowError(PASSWORD)
    }

    if (!inputNotEmpty(PASSWORD_CONFIRM))
    {
        errors.push(PASSWORD_CONFIRM);
    } else if (PASSWORD_CONFIRM.value != PASSWORD.value)
    {
        errors.push(PASSWORD_CONFIRM);
        showError(PASSWORD, "Password does not match!");
        showError(PASSWORD_CONFIRM, "Password does not match!");
    } else {
        doNotShowError(PASSWORD_CONFIRM)
    }
    
    if (errors.length === 0) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./resetPassword.asp");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    RESET_FORM.reset();
                    window.alert("Password Change Succesfully");
                    window.location.href = "settings.asp";
                }     
            }
        };

    var password = encodeURIComponent(PASSWORD_CONFIRM.value);
    
    var payload = "password=" + password;
    
    xhr.send(payload);

  } else {
    errors.forEach(error => {
      showError(error);
    });
  }
}

function inputNotEmpty(elem){
    elem.nextElementSibling.innerHTML = "Field is empty!"
    return elem.value != "";
}

function showError(elem, message = null){
    elem.style.borderColor = "red";

    let errorMsgContainer = elem.nextElementSibling;
    if(message != null)
    {
        errorMsgContainer.innerHTML = message;
    }
    errorMsgContainer.classList.remove("hidden");

}

function doNotShowError(elem)
{
    elem.style.borderColor = "";
    let errorMsgContainer = elem.nextElementSibling;
    errorMsgContainer.classList.add("hidden");
}
