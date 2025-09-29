var btns = document.querySelectorAll(".container .btn");
var isTurnX = true,
  clickTimes = 0;

btns.forEach(function (btn, index) {
  btn.onclick = function () {
    if (btn.getAttribute("disable")) return;
    if (isTurnX) {
      btn.classList.add("turn-x");
      btn.innerText = "X";
    } else {
      btn.classList.add("turn-o");
      btn.innerText = "O";
    }

    clickTimes++;
    if (clickTimes > 4) {
      var currentVal = btns[index].innerText,
        xWon = false,
        oWon = false;

      if (index == 0) {
        if (
          (currentVal == btns[1].innerText &&
            currentVal == btns[2].innerText) ||
          (currentVal == btns[3].innerText &&
            currentVal == btns[6].innerText) ||
          (currentVal == btns[4].innerText && currentVal == btns[8].innerText)
        ) {
          if (currentVal === "X") xWon = true;
          else oWon = true;
        }
      } else if (index == 1) {
        if (
          (currentVal == btns[0].innerText &&
            currentVal == btns[2].innerText) ||
          (currentVal == btns[4].innerText && currentVal == btns[7].innerText)
        ) {
          if (currentVal === "X") xWon = true;
          else oWon = true;
        }
      } else if (index == 2) {
        if (
          (currentVal == btns[0].innerText &&
            currentVal == btns[1].innerText) ||
          (currentVal == btns[4].innerText &&
            currentVal == btns[6].innerText) ||
          (currentVal == btns[5].innerText && currentVal == btns[8].innerText)
        ) {
          if (currentVal === "X") xWon = true;
          else oWon = true;
        }
      } else if (index == 3) {
        if (
          (currentVal == btns[0].innerText &&
            currentVal == btns[6].innerText) ||
          (currentVal == btns[4].innerText && currentVal == btns[5].innerText)
        ) {
          if (currentVal === "X") xWon = true;
          else oWon = true;
        }
      } else if (index == 4) {
        if (
          (currentVal == btns[0].innerText &&
            currentVal == btns[8].innerText) ||
          (currentVal == btns[2].innerText &&
            currentVal == btns[6].innerText) ||
          (currentVal == btns[3].innerText &&
            currentVal == btns[5].innerText) ||
          (currentVal == btns[1].innerText && currentVal == btns[7].innerText)
        ) {
          if (currentVal === "X") xWon = true;
          else oWon = true;
        }
      } else if (index == 5) {
        if (
          (currentVal == btns[2].innerText &&
            currentVal == btns[8].innerText) ||
          (currentVal == btns[3].innerText && currentVal == btns[4].innerText)
        ) {
          if (currentVal === "X") xWon = true;
          else oWon = true;
        }
      } else if (index == 6) {
        if (
          (currentVal == btns[0].innerText &&
            currentVal == btns[3].innerText) ||
          (currentVal == btns[4].innerText &&
            currentVal == btns[2].innerText) ||
          (currentVal == btns[7].innerText && currentVal == btns[8].innerText)
        ) {
          if (currentVal === "X") xWon = true;
          else oWon = true;
        }
      } else if (index == 7) {
        if (
          (currentVal == btns[1].innerText &&
            currentVal == btns[4].innerText) ||
          (currentVal == btns[6].innerText && currentVal == btns[8].innerText)
        ) {
          if (currentVal === "X") xWon = true;
          else oWon = true;
        }
      } else {
        if (
          (currentVal == btns[0].innerText &&
            currentVal == btns[4].innerText) ||
          (currentVal == btns[2].innerText &&
            currentVal == btns[5].innerText) ||
          (currentVal == btns[6].innerText && currentVal == btns[7].innerText)
        ) {
          if (currentVal === "X") xWon = true;
          else oWon = true;
        }
      }

      setTimeout(function () {
        if (xWon) {
          alert("X win!");
          location.reload();
        } else if (oWon) {
          alert("O win!");
          location.reload();
        } else if (clickTimes === 8) {
          alert("Game over");
          location.reload();
        }
      }, 100);
    }

    isTurnX = !isTurnX;
    btn.setAttribute("disable", "true");
  };
});
