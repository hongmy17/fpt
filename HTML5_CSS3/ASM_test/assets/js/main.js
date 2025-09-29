// alert("Cô mở bằng live server dùm em.");

const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

// header
const headerNavbar = $(".header__navbar");
const headerNavbarIcon = $(".header-mobile-tablet__navbar-icon");
const headerNavbarOverlay = $(".header-mobile-tablet__navbar-overlay");
const headerNavbarCloseIcon = $(".header-mobile-tablet__close-icon");
const headerNavbarLinks = $$(".header__navbar-link");
const headerLogoLink = $(".header__logo-link");

headerNavbarIcon.onclick = slideIn;
headerNavbarOverlay.onclick = slideOut;
headerNavbarCloseIcon.onclick = slideOut;

function slideIn() {
  headerNavbarOverlay.style.display = "block";
  headerNavbar.style.transform = "translateX(0)";

  if (slider) {
    slider.style.zIndex = "-5";
  }
}

function slideOut() {
  headerNavbarOverlay.style.display = "none";
  headerNavbar.style.transform = "translateX(100%)";

  if (slider) {
    setTimeout(() => {
      slider.style.zIndex = "10";
    }, 300);
  }
}

window.onresize = function () {
  window.innerWidth >= 1024 ? slideIn() : slideOut();
};
// end header

// content
// get content
headerLogoLink.onclick = function () {
  const itemLinkActive = $(".header__navbar-link.active");
  itemLinkActive.classList.remove("active");
  content.loadContent();
};

headerNavbarLinks.forEach((itemLink) => {
  itemLink.onclick = function () {
    const itemLinkActive = $(".header__navbar-link.active");
    itemLinkActive.classList.remove("active");
    this.classList.add("active");
    const fileName = this.id;
    window.innerWidth < 1024 && slideOut();
  };
});

class Content extends HTMLElement {
  constructor() {
    super();
    const shadowEl = this.attachShadow({ mode: "open" });
    this.loadContent(shadowEl);
  }

  async loadContent(shadowEl, fileName = "home") {
    shadowEl.innerHTML = `
      ${await fetch(`pages/${fileName}.html`).then((response) =>
        response.text()
      )}`;
  }
}
customElements.define("main-content", Content);
const content = new Content();
// end content
