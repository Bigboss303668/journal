function togglePasswordVisibility(inputId) {
  var passwordInput = document.getElementById(inputId);
  var eyeIcon = document.querySelector('.uk-form-icon-eye');

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    eyeIcon.setAttribute("uk-icon", "icon: eye-slash");
  } else {
    passwordInput.type = "password";
    eyeIcon.setAttribute("uk-icon", "icon: eye");
  }
}