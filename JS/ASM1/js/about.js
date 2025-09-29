let $$ = document.querySelectorAll.bind(document);
let imgs = $$(".gallery__food-img"),
  imgToolbars = $$(".img-toolbar");

window.onload = () => {
  for (let i = 0; i < imgToolbars.length; i++)
    imgToolbars[i].style.top = imgs[i].offsetHeight / 2 + "px";
};

imgs.forEach((img, index) => {
  img.onmouseenter = () => {
    imgToolbars[index].classList.add("active");
  };

  img.onmouseleave = () => {
    imgToolbars[index].classList.remove("active");
  };

  imgToolbars[index].onmouseenter = () => {
    imgToolbars[index].classList.add("active");
  };
});
