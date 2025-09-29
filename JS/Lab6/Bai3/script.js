var imgRollOver = document.getElementById("img-rollover");
var imgSlideShow = document.getElementById("img-slideshow");
var firstBtn = document.getElementById("first-btn");
var prevBtn = document.getElementById("prev-btn");
var nextBtn = document.getElementById("next-btn");
var lastBtn = document.getElementById("last-btn");

imgRollOver.onmouseenter = function () {
  imgRollOver.src = "./img/pic2.jpg";
};

imgRollOver.onmouseleave = function () {
  imgRollOver.src = "./img/pic1.jpg";
};

var currentIndex = 1;
nextBtn.onclick = function () {
  if (currentIndex < 5) currentIndex++;
};

prevBtn.onclick = function () {
  if (currentIndex > 1) currentIndex--;
};

firstBtn.onclick = function () {
  currentIndex = 1;
};

lastBtn.onclick = function () {
  currentIndex = 5;
};

window.onclick = function () {
  imgSlideShow.src = `./img/pic${currentIndex}.jpg`;
};
