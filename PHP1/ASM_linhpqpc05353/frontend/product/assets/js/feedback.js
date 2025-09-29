$('.header__navbar-link[href*="feedback.php"]').classList.add("active");

const windowParent = window.parent.document.body;
const submitBtn = $(".submit-btn");
const btnChecks = document.querySelectorAll(".btn-check");

submitBtn.onclick = function () {
  let isChecked = false;
  for (let btn of btnChecks) if (btn.checked) isChecked = true;

  if (isChecked) {
    const announceSuccessFeedback = windowParent.querySelector(
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
    const announceNoFeedback = windowParent.querySelector(
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
