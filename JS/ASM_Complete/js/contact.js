const $ = document.querySelector.bind(document);
const form = $(".content__form");
const nameInput = $(".content__form-name");
const emailInput = $(".content__form-email");
const messInput = $(".content__form-message");
const announceSuccessContact = window.parent.document.body.querySelector(
  ".announce-success-contact"
);

// const regexName = /^[a-zA-Z]+$/;
const regexName = /^[^\s][a-zA-Z\s]*$/;
const regexMess = /^.{50,}$/;
const regexEmail =
  /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

let isName;
let isEmail;
let isMess;

function validate(element, regex) {
  if (regex.test(element.value)) {
    element.style.borderLeft = "";
    return true;
  } else {
    element.style.borderLeft = "5px solid red";
    return false;
  }
}

nameInput.onfocus = function () {
  this.style.borderLeft = "";
};

emailInput.onfocus = function () {
  this.style.borderLeft = "";
};

messInput.onfocus = function () {
  this.style.borderLeft = "";
};

nameInput.onblur = function () {
  isName = validate(this, regexName);
};

emailInput.onblur = function () {
  isEmail = validate(this, regexEmail);
};

messInput.onblur = function () {
  isMess = validate(this, regexMess);
};

form.onsubmit = function (e) {
  e.preventDefault();
  isName = validate(nameInput, regexName);
  isEmail = validate(emailInput, regexEmail);
  isMess = validate(messInput, regexMess);

  const isSuccessContact = isName && isEmail && isMess;
  if (isSuccessContact) {
    announceSuccessContact.style.top = "0";
    announceSuccessContact.onclick = (e) => {
      if (e.target.matches(".announce-success-contact"))
        announceSuccessContact.style.top = "";
    };

    setTimeout(() => {
      announceSuccessContact.style.top = "";
    }, 2000);
    isName = isEmail = isMess = null;
    this.reset();
  }
};
