let $ = document.querySelector.bind(document);
// var parentWindow = window.parent.contentWindow;
let sendBtn = $(".content__form-submit"),
  announceSuccessContact = window.parent.document.body.querySelector(
    ".announce-success-contact"
  );

sendBtn.onclick = (e) => {
  e.preventDefault();
  let regexName = /^[a-zA-Z ]+$/,
    regexEmail =
      /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

  function validate(element, regex) {
    if (regex.test(element.value)) {
      element.style.borderLeft = "";
      return true;
    } else {
      element.style.borderLeft = "5px solid red";
      return false;
    }
  }

  let isName = validate($(".content__form-name"), regexName),
    isEmail = validate($(".content__form-email"), regexEmail);
  let isSuccessContact = isName && isEmail;
  // && $(".content__form-message").value.trim().length > 1;
  if (isSuccessContact) {
    announceSuccessContact.style.top = "0";

    announceSuccessContact.onclick = (e) => {
      if (e.target.matches(".announce-success-contact"))
        announceSuccessContact.style.top = "";
    };

    setTimeout(() => {
      announceSuccessContact.style.top = "";
    }, 2000);
  }
};
