var btns = document.querySelectorAll(".container .btn");
var isTurnX = true,
  clickTimes = 0;

btns.forEach(function (btn) {
  btn.onclick = function () {
    if (!btn.getAttribute("disable")) {
      if (isTurnX) {
        btn.classList.add("turn-x");
        btn.innerText = "X";
      } else {
        btn.classList.add("turn-o");
        btn.innerText = "O";
      }

      clickTimes++;
      if (clickTimes === 8) {
        setTimeout(function () {
          alert("Game over");
          location.reload();
        }, 250);
      }

      isTurnX = !isTurnX;
      btn.setAttribute("disable", "true");
    }
  };
});
