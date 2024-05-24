document.addEventListener("DOMContentLoaded", () => {
  // Responsive Menu
  const menuBtn = document.querySelector(".menuToggle"),
    menu = document.querySelector(".meroNavbar"),
    menuCloser = document.querySelector(".bandaGar");

  if (menuBtn && menu && menuCloser) {
    menuBtn.addEventListener("click", () => {
      menu.classList.add("active");
      menuCloser.style.display = "block";
    });

    menuCloser.addEventListener("click", () => {
      menu.classList.remove("active");
      menuCloser.style.display = "none";
    });
  }

  // Password visibility toggle
  const passwordField = document.getElementById("passwordField"),
    showPass = document.getElementById("showPassword"),
    hidePass = document.getElementById("hidePassword");

  if (passwordField && showPass && hidePass) {
    showPass.addEventListener("click", () => {
      showPass.classList.add("hide");
      hidePass.classList.remove("hide");
      passwordField.type = "text";
    });

    hidePass.addEventListener("click", () => {
      hidePass.classList.add("hide");
      showPass.classList.remove("hide");
      passwordField.type = "password";
    });
  }

  // Function to toggle password visibility using checkbox
  const passwordToggleButton = document.getElementById("passwordToggle");

  if (passwordToggleButton) {
    passwordToggleButton.addEventListener("change", () => {
      passwordField.type = passwordToggleButton.checked ? "text" : "password";
    });
  }

  // Function to close alert boxes

  alertCloser = document.getElementById("closeAlerts");

  alertCloser.addEventListener("click", () => {
    const alertBoxes = document.querySelectorAll(".alert");
    alertBoxes.forEach((alertBox) => {
      alertBox.classList.add("alertClosed");
    });
  });

  // Hide alert container after a timeout
  const alertContainer = document.getElementById("alertContainer");

  if (alertContainer) {
    setTimeout(() => {
      alertContainer.style.opacity = "0";
    }, 5000);
    setTimeout(() => {
      alertContainer.style.display = "none";
    }, 6000);
  }
});
