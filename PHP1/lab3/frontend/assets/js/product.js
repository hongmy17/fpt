const $$ = document.querySelectorAll.bind(document);

window.onload = function () {
  const imgToolbars = $$(".img-toolbar");
  $$(".gallery__food-text").forEach((text, index) => {
    imgToolbars[index].style.bottom = text.offsetHeight + 10 + "px";
  });
};

const heartIcons = $$(".img-toolbar .heart-icon");
const cartIcons = $$(".img-toolbar .cart-icon");

heartIcons.forEach((heartIcon) => {
  heartIcon.onclick = toggleActive;
});

cartIcons.forEach((cartIcon) => {
  cartIcon.onclick = toggleActive;
});

function toggleActive() {
  this.classList.toggle("active");
}
