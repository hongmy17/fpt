const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const iframe = $("iframe");
const categoryLinks = $$(".category-link");

iframe.onload = () => {
  iframe.style.height = iframe.contentWindow.document.body.offsetHeight + "px";
};
