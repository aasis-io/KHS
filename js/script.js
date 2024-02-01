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
  passwordShown = document.getElementById("password-shown"),
  passwordField = document.getElementById("passwordField");

passwordHidden.addEventListener("click", function () {
  passwordHidden.classList.add("hide");
  passwordShown.classList.remove("hide");
  passwordField.type = "text";
});

passwordShown.addEventListener("click", function () {
  passwordShown.classList.add("hide");
  passwordHidden.classList.remove("hide");
  passwordField.type = "password";
});
