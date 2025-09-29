const $ = document.querySelector.bind(document);

// bai1
const image = $("#slideshow img");
const prevBtn = $("#slideshow #prev");
const playBtn = $("#slideshow #play");
const pauseBtn = $("#slideshow #pause");
const nextBtn = $("#slideshow #next");
const images = ["walle", "fight", "love", "mo"];
let index = 0;
let autoClick;

prevBtn.onclick = function () {
  if (index > 0) {
    index--;
  } else {
    index = images.length - 1;
  }
  image.src = `${images[index]}.jpg`;
};

playBtn.onclick = function () {
  autoClick = setInterval(() => {
    nextBtn.click();
  }, 900);
};

pauseBtn.onclick = function () {
  clearInterval(autoClick);
};

nextBtn.onclick = function () {
  if (index < images.length - 1) {
    index++;
  } else {
    index = 0;
  }
  image.src = `${images[index]}.jpg`;
};

// Bai2
const form = $("#form");

form.onsubmit = function (e) {
  e.preventDefault();
  getFormMessage("username").textContent =
    isRequired("username", "Tên đăng nhập chưa điền") ||
    minLength("username", 10);
  getFormMessage("password").textContent =
    isRequired("password", "Chưa đặt mật khẩu") ||
    minLength("password", 6) ||
    isPassword("password");
  getFormMessage("account-type").textContent = isRequired(
    "account-type",
    "Chưa chọn loại tài khoản"
  );
  getFormMessage("language").textContent = isChecked(
    "language",
    "Chưa chọn ngôn ngữ hiển thị"
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

function minLength(name, min) {
  const element = form.querySelector(`[name="${name}"]`);
  return element.value.trim().length >= min
    ? ""
    : `Vui lòng nhập tối thiểu ${min} ký tự`;
}

function isPassword(name) {
  // const regexPassword = /([a-z])|(\d)/;
  const regexPassword = /^[a-z0-9]+$/;
  const element = form.querySelector(`[name="${name}"]`);
  return regexPassword.test(element.value)
    ? ""
    : "Mật khẩu chỉ có thể là chữ só hoặc chữ in thường";
}

function isChecked(name, message) {
  const elements = form.querySelectorAll(`[name="${name}"]`);
  for (let element of elements) {
    if (element.checked) return "";
  }
  return message || "Vui long chon gia tri";
}
