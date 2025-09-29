function valForm() {
  if (event.target.firstName.value === "") {
    message("Need a first name");
    return false;
  }

  if (event.target.lastName.value === "") {
    message("Need a last name");
    return false;
  }

  if (event.target.age.value === " ") {
    message("Need a age");
    return false;
  }
  return true;
}

function message(m) {
  document.getElementById("wrapper").innerText = m;
}
