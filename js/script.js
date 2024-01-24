function togglePassword() {
  var passwordToggleButton = document.getElementById("passwordToggle"),
    passwordInputField = document.getElementById("passwordField");

  passwordInputField.type = passwordToggleButton.checked ? "text" : "password";
}


function alertCloser() {
  var alertBoxes = document.querySelectorAll(".alert");

  // Use forEach to add the "alertClosed" class to each element
  alertBoxes.forEach(function (alertBox) {
    alertBox.classList.add("alertClosed");
  });
}