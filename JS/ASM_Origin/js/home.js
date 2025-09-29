let $ = document.querySelector.bind(document),
  $$ = document.querySelectorAll.bind(document);

let nextBtn = $(".next-btn"),
  prevBtn = $(".prev-btn"),
  wrapper = $(".wrapper");
let currentIndex = 0,
  numSlides = 3;
let dotActive = $(".dot-active");

nextBtn.onclick = () => {
  if (currentIndex == numSlides - 1) {
    wrapper.style.transform = `translateX(0)`;
    currentIndex = 0;
  } else {
    currentIndex++;
    wrapper.style.transform = `translateX(-${
      wrapper.clientWidth * currentIndex
    }px)`;
  }
  activeDot(currentIndex);
};

prevBtn.onclick = () => {
  if (currentIndex <= 0) {
    currentIndex = numSlides - 1;
    wrapper.style.transform = `translateX(-${
      wrapper.clientWidth * currentIndex
    }px)`;
  } else {
    currentIndex--;
    wrapper.style.transform = `translateX(-${
      wrapper.clientWidth * currentIndex
    }px)`;
  }
  activeDot(currentIndex);
};

let parentLeft =
  $(".dot-container").offsetLeft - $(".dot-container").offsetWidth / 2;
dotActive.style.left = parentLeft + "px";

let clickInterval = setInterval(() => {
  nextBtn.click();
}, 3000);

function activeDot(index) {
  dotActive.style.left =
    parentLeft + $(`[data-index="${index}"]`).offsetLeft + "px";

  clearInterval(clickInterval);
  clickInterval = setInterval(() => {
    nextBtn.click();
  }, 3000);
}

document.body.onclick = (e) => {
  if (e.target.matches(".dot")) {
    let index = e.target.dataset.index;
    if (index > currentIndex) {
      let clickTimes = index - currentIndex;
      for (let i = 0; i < clickTimes; i++) nextBtn.click();
    } else {
      let clickTimes = currentIndex - index;
      for (let i = 0; i < clickTimes; i++) prevBtn.click();
    }
  }
};
