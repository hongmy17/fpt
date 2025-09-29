var stars = document.querySelectorAll(".star");
var outPut = document.querySelector(".output");

stars.forEach(function (star, index) {
  star.onclick = function () {
    if (star.classList.contains("active")) {
      for (let start = index + 1; start < 5; start++)
        stars[start].classList.remove("active");
    } else {
      for (let start = index; start >= 0; start--)
        stars[start].classList.add("active");
    }

    outPut.innerHTML = `You Rate this ${index + 1} stars`;
  };
});
