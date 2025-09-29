const $ = document.querySelector.bind(document);
// slideshow
const firstBtn = $("#first");
const prevBtn = $("#prev");
const playBtn = $("#play");
const pauseBtn = $("#pause");
const nextBtn = $("#next");
const lastBtn = $("#last");
const image = $("img");

const images = ["night", "moon", "grass", "balloon"];
let index = 0;
let autoClick;

firstBtn.onclick = function () {
  index = 0;
  image.src = `${images[index]}.jpg`;
};

prevBtn.onclick = function () {
  if (index > 0) {
    index--;
    image.src = `${images[index]}.jpg`;
  } else {
    nextBtn.click();
  }
};

playBtn.onclick = function () {
  autoClick = setInterval(() => {
    nextBtn.click();
  }, 1300);
};

pauseBtn.onclick = function () {
  clearInterval(autoClick);
};

nextBtn.onclick = function () {
  if (index < images.length - 1) {
    index++;
    image.src = `${images[index]}.jpg`;
  } else {
    firstBtn.click();
  }
};

lastBtn.onclick = function () {
  index = images.length - 1;
  image.src = `${images[index]}.jpg`;
};

// form
const form = $("#form");
const majorCheckbox = $("#major");
const idMajor = $("#id-major");

form.onsubmit = function (e) {
  e.preventDefault();
  getFormMessage("id").textContent =
    isRequired("id", "Vui long nhap ma sinh vien") || isId("id");
  getFormMessage("name").textContent = isRequired("name", "Vui long nhap ten");
  getFormMessage("age").textContent =
    isRequired("age", "Vui long nhap so tuoi") ||
    isAge("age") ||
    minAge("age", 18);
  getFormMessage("gender").textContent = isChecked(
    "gender",
    "Vui long chon gioi tinh"
  );
};

function getFormMessage(name) {
  let formGroup = form.querySelector(`[name="${name}"]`).parentNode;
  while (!formGroup.matches(".form-group")) {
    formGroup = formGroup.parentNode;
  }
  return formGroup.querySelector(".form-message");
}

function isRequired(name, message) {
  const element = form.elements[name];
  return element.value.trim() ? "" : message || "Vui long nhap truong nay";
}

function isId(name) {
  const element = form.elements[name];
  // const regexId = /^(PC|PX)\d{5}$/;
  // const regexId = /^((P|p)((X|x)|(C|c)))\d{5}$/;
  // const regexId = /^((p)[a-oq-z])\d{5}$/i;
  // /^(?!.*(.).*\1)[A-Za-z]+$/
  const regexId = /^((p)([^p]*)[a-oq-z])\d{5}$/i;
  return regexId.test(element.value) ? "" : "Ma sinh vien chua dung";
}

function minAge(name, min) {
  const element = form.elements[name];
  return +element.value >= 18 ? "" : `So tuoi ko duoc nho hon ${min}`;
}

function isAge(name) {
  const element = form.elements[name];
  return Number.isInteger(+element.value) ? "" : "Vui long nhap so";
}

function isChecked(name, message) {
  const elements = form.querySelectorAll(`[name="${name}"]`);
  for (let element of elements) {
    if (element.checked) return "";
  }
  return message || "Vui long chon gia tri";
}

majorCheckbox.oninput = function () {
  if (this.checked) {
    idMajor.readOnly = false;
    majorCheckbox.style.backgroundColor = "";
  } else {
    idMajor.value = null;
    idMajor.readOnly = true;
  }
};
