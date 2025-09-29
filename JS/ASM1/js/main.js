let $ = document.querySelector.bind(document);
let $$ = document.querySelectorAll.bind(document);

let iframe = $("iframe");
let menuItems = $$(".header__menu a:not([href='#'])");

menuItems.forEach((item) => {
  item.onclick = () => {
    $(".header__menu a.active").classList.remove("active");
    item.classList.add("active");
  };
});

Object.assign(iframe.style, {
  width: window.innerWidth + "px",
  marginTop: $(".header").clientHeight + "px",
});

iframe.onload = () => {
  iframe.style.height = iframe.contentWindow.document.body.offsetHeight + "px";
};
