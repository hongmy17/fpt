$('.header__navbar-link[href*="contact.php"]').classList.add("active");

// contact form
const contactForm = $(".contact__form");
const contactFormNameInput = $(".contact__form-name");
const contactFormEmailInput = $(".contact__form-email");
const contactFormMess = $(".contact__form-message");

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

contactFormNameInput.onfocus = function () {
  this.style.borderLeft = "";
};

contactFormEmailInput.onfocus = function () {
  this.style.borderLeft = "";
};

contactFormMess.onfocus = function () {
  this.style.borderLeft = "";
};

contactFormNameInput.onblur = function () {
  isName = validate(this, regexName);
};

contactFormEmailInput.onblur = function () {
  isEmail = validate(this, regexEmail);
};

contactFormMess.onblur = function () {
  isMess = validate(this, regexMess);
};

contactForm.onsubmit = function (e) {
  e.preventDefault();
  isName = validate(contactFormNameInput, regexName);
  isEmail = validate(contactFormEmailInput, regexEmail);
  isMess = validate(contactFormMess, regexMess);

  const isSuccessContact = isName && isEmail && isMess;
  if (isSuccessContact) {
    const announceSuccessContact = window.parent.document.body.querySelector(
      ".announce-success-contact"
    );
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
