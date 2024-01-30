function togglePassword() {
  var passwordToggleButton = document.getElementById("passwordToggle"),
    passwordInputField = document.getElementById("passwordField");

  passwordInputField.type = passwordToggleButton.checked ? "text" : "password";
}

function alertCloser() {
  var alertBoxes = document.querySelectorAll(".alert");
  alertBoxes.forEach(function (alertBox) {
    alertBox.classList.add("alertClosed");
  });
}

var passwordHidden = document.getElementById("password-hidden"),
  passwordShown = document.getElementById("password-shown");
