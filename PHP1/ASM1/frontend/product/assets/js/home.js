const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const windowParent = window.parent.document.body;
const headerLogoLink = windowParent.querySelector(".header__logo-link");

// banner
const arrBanner = ["banner1", "banner2", "banner3"];
const banner = $(".banner");
const bannerImg = $(".banner__img");
let currentIndexImg = 0;

setInterval(() => {
  currentIndexImg++;
  if (currentIndexImg > arrBanner.length - 1) currentIndexImg = 0;
  bannerImg.setAttribute(
    "src",
    `../assets/images/${arrBanner[currentIndexImg]}.jpg`
  );
}, 3000);

banner.onclick = function () {
  windowParent.querySelector('.header__navbar-link[id="about"]').click();
  window.parent.scrollTo({
    top: 371,
    behavior: "smooth",
  });
};
// end banner

// slider
const sliderPrevBtn = $(".prev-btn");
const sliderNextBtn = $(".next-btn");
const slider = $(".slider");

window.onload = function () {
  sliderPrevBtn.style.left = headerLogoLink.offsetLeft + "px";
  sliderNextBtn.style.right = headerLogoLink.offsetLeft + "px";
};

window.onresize = function () {
  sliderPrevBtn.style.left = headerLogoLink.offsetLeft + "px";
  sliderNextBtn.style.right = headerLogoLink.offsetLeft + "px";
};

slider.onclick = function () {
  moveControl(headerLogoLink.offsetLeft);
};

function moveControl(px) {
  if (sliderPrevBtn.offsetLeft > 0) {
    sliderNextBtn.style.right = "-100px";
    sliderPrevBtn.style.left = "-100px";
  } else {
    sliderNextBtn.style.right = px + "px";
    sliderPrevBtn.style.left = px + "px";
  }
}

// click on slider
const sliderWrapper = $(".wrapper");
let currentIndex = 0;
const numSlides = 3;
const dotActive = $(".dot-active");
const dots = $$(".dot");

sliderNextBtn.onclick = (e) => {
  e.stopPropagation();
  if (currentIndex == numSlides - 1) {
    sliderWrapper.style.transform = `translateX(0)`;
    currentIndex = 0;
  } else {
    currentIndex++;
    sliderWrapper.style.transform = `translateX(-${
      sliderWrapper.clientWidth * currentIndex
    }px)`;
  }
  activeDot(currentIndex);
};

sliderPrevBtn.onclick = (e) => {
  e.stopPropagation();
  if (currentIndex <= 0) {
    currentIndex = numSlides - 1;
    sliderWrapper.style.transform = `translateX(-${
      sliderWrapper.clientWidth * currentIndex
    }px)`;
  } else {
    currentIndex--;
    sliderWrapper.style.transform = `translateX(-${
      sliderWrapper.clientWidth * currentIndex
    }px)`;
  }
  activeDot(currentIndex);
};

// assign value when loaded, if it doesn't de-play, it will error
let parentLeft;
setTimeout(() => {
  parentLeft =
    $(".dot-container").offsetLeft - $(".dot-container").offsetWidth / 2;
  dotActive.style.left = parentLeft + "px";
}, 500);

let clickInterval = setInterval(() => {
  sliderNextBtn.click();
}, 3000);

function activeDot(index) {
  dotActive.style.left =
    parentLeft + $(`[data-index="${index}"]`).offsetLeft + "px";

  clearInterval(clickInterval);
  clickInterval = setInterval(() => {
    sliderNextBtn.click();
  }, 3000);
}

dots.forEach((dot, index) => {
  dot.onclick = (e) => {
    e.stopPropagation();
    if (index > currentIndex) {
      let clickTimes = index - currentIndex;
      for (let i = 0; i < clickTimes; i++) sliderNextBtn.click();
    } else {
      let clickTimes = currentIndex - index;
      for (let i = 0; i < clickTimes; i++) sliderPrevBtn.click();
    }
  };
});
// end slider
