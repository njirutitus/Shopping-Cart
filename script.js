var code = document.getElementById("new_password");

var strengthbar = document.getElementById("meter");
var display = document.getElementsByClassName("strength")[0];
var match = document.getElementById("match");

code.addEventListener("keyup", function () {
  checkpassword(code.value);
});

var new_password = document.getElementById("new_password");
var confirm_password = document.getElementById("confirm_password");
var submit = document.getElementById("submit");

confirm_password.addEventListener("keyup", function () {
  validate(confirm_password.value);
});

new_password.addEventListener("keyup", function () {
  validate(new_password.value);
});

function checkpassword(password) {
  var strength = 0;
  if (password.match(/[a-z]+/)) {
    strength += 1;
  }
  if (password.match(/[A-Z]+/)) {
    strength += 1;
  }
  if (password.match(/[0-9]+/)) {
    strength += 1;
  }
  if (password.match(/[$@#&!]+/)) {
    strength += 1;
  }

  if (password.length < 6) {
    display.innerHTML = "minimum number of characters is 6";
  } else if (password.length > 12) {
    display.innerHTML = "maximum number of characters is 12";
  } else if (password.length >= 6 && password.length <= 12) {
    display.innerHTML = "";
  }

  switch (strength) {
    case 0:
      strengthbar.value = 0;
      break;

    case 1:
      strengthbar.value = 25;
      break;

    case 2:
      strengthbar.value = 50;
      break;

    case 3:
      strengthbar.value = 75;
      break;

    case 4:
      strengthbar.value = 100;
      break;
  }
  if (strength < 3) {
    display.innerHTML = "Make Password Stronger";
  } else {
    display.innerHTML = "";
  }

  if (strength >= 3 && password.length >= 6 && password.length <= 12) {
    console.log(strength);
    return true;
  } else {
    console.log(strength);
    return false;
  }
}

function confirmPassword() {
  if (new_password.value == confirm_password.value) {
    match.innerHTML = "Passwords match";
    match.className = "text-success";
    return true;
  } else {
    match.innerHTML = "Passwords Do not match";
    match.className = "text-danger";
    return false;
  }
}
function validate() {
  if (confirmPassword() && checkpassword(code.value)) {
    return true;
  } else {
    console.log("Form not valid");
    return false;
  }
}
