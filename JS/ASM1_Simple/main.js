let $ = document.querySelector.bind(document);
let nextBtn = $(".slider .next"),
  prevBtn = $(".slider .prev"),
  sliderImg = $(".slider img");

let curIndex = 1;
nextBtn.onclick = function () {
  if (curIndex < 3) {
    curIndex++;
    sliderImg.src = `./img/pic${curIndex}.jpg`;
  }
};

prevBtn.onclick = function () {
  if (curIndex > 1) {
    curIndex--;
    sliderImg.src = `./img/pic${curIndex}.jpg`;
  }
};

let productImg = $(".product img"),
  productToolbar = $(".product .toolbar");

productImg.onmouseover = function () {
  productToolbar.style.display = "block";
};

productImg.onmouseleave = function () {
  productToolbar.style.display = "";
};
