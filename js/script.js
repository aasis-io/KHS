// Responsive Menu
var menuBtn = document.querySelector(".menuToggle"),
  menu = document.querySelector(".meroNavbar"),
  menuCloser = document.querySelector(".bandaGar");

menuBtn.addEventListener("click", () => {
  menu.classList.add("active");
  menuCloser.style.display = "block";
});

menuCloser.addEventListener("click", () => {
  menu.classList.remove("active");
  menuCloser.style.display = "none";
});

// Function to toggle password visibility
function togglePassword() {
  var passwordToggleButton = document.getElementById("passwordToggle"),
    passwordInputField = document.getElementById("passwordField");
  passwordInputField.type = passwordToggleButton.checked ? "text" : "password";
}

// Function to close alert boxes
function alertCloser() {
  var alertBoxes = document.querySelectorAll(".alert");
  alertBoxes.forEach(function (alertBox) {
    alertBox.classList.add("alertClosed");
  });
}

// Hide alert container after a timeout
var alertContainer = document.getElementById("alertContainer");

setTimeout(function () {
  alertContainer.style.opacity = "0";
}, 5000);
setTimeout(function () {
  alertContainer.style.display = "none";
}, 6000);

// Password visibility toggle using hidden and shown icons
const passwordHidden = document.querySelector(".fa-eye-slash"),
  passwordShown = document.querySelector(".fa-eye"),
  passwordField = document.querySelector(".passwordField");

passwordHidden.addEventListener("click", () => {
  passwordHidden.classList.add("hide");
  passwordShown.classList.remove("hide");
  passwordField.type = "text";
});

passwordShown.addEventListener("click", () => {
  passwordShown.classList.add("hide");
  passwordHidden.classList.remove("hide");
  passwordField.type = "password";
});
