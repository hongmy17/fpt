// slider
const sliderPrevBtn = $(".prev-btn");
const sliderNextBtn = $(".next-btn");
const slider = $(".slider");

slider.onclick = function () {
  if (window.innerHeight >= 1024) {
    moveControl(32);
  } else if (window.innerWidth < 740) {
    moveControl(8);
  } else {
    moveControl(20);
  }
};

function moveControl(px) {
  if (sliderPrevBtn.offsetLeft > 0) {
    sliderNextBtn.style.right = "-40px";
    sliderPrevBtn.style.left = "-40px";
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

const parentLeft =
  $(".dot-container").offsetLeft - $(".dot-container").offsetWidth / 2;
dotActive.style.left = parentLeft + "px";

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
