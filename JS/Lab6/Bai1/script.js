var titles = document.querySelectorAll(".title");
var texts = document.querySelectorAll(".myText");

titles.forEach(function (title, index) {
  title.onclick = function () {
    texts[index].classList.toggle("active");
  };
});
