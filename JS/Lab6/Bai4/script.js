var box = document.getElementById("box");
var text = document.querySelector("h3");

function getNumRandom() {
  return Math.floor(Math.random() * 85);
}

box.style.top = `${getNumRandom()}%`;
box.style.left = `${getNumRandom()}%`;
var startTime = new Date();

box.onclick = function () {
  box.style.display = "none";
  var currentTime = new Date();
  text.innerText = `It took ${
    (currentTime - startTime) / 1000
  } seconds to click`;
};
