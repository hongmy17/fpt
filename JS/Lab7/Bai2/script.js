function toTheRight() {
  let box = document.getElementById("box");
  let x = 0;

  setInterval(function () {
    if (x === 600) {
      clearInterval();
    } else {
      x++;
      box.style.left = x + "px";
    }
  }, 2);
}
