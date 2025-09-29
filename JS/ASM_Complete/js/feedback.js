let windowParent = window.parent.document.body;
let $ = document.querySelector.bind(document);

$('.btn[type="button"]').onclick = () => {
  btnChecks = document.body.querySelectorAll(".btn-check");
  let isChecked = false;
  for (let btn of btnChecks) if (btn.checked) isChecked = true;

  if (isChecked) {
    let announceSuccessFeedback = windowParent.querySelector(
      ".announce-success-feedback"
    );
    announceSuccessFeedback.style.top = "0";

    announceSuccessFeedback.onclick = (e) => {
      if (e.target.matches(".announce-success-feedback"))
        announceSuccessFeedback.style.top = "";
    };

    setTimeout(() => {
      announceSuccessFeedback.style.top = "";
    }, 2000);
    $('.btn[type="reset"]').click();
  } else {
    let announceNoFeedback = windowParent.querySelector(
      ".announce-no-feedback"
    );

    announceNoFeedback.style.transform = "translateX(0)";
    setTimeout(() => {
      announceNoFeedback.style.transform = "translateX(150%)";
    }, 2000);
    let closeBtn = announceNoFeedback.querySelector(".close-btn");

    closeBtn.onclick = () => {
      announceNoFeedback.style.transform = "translateX(150%)";
    };
  }
};
