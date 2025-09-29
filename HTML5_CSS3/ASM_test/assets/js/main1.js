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
$("main-content").style.marginTop = $(".header").clientHeight + "px";

// get content
headerLogoLink.onclick = function () {
  const itemLinkActive = $(".header__navbar-link.active");
  itemLinkActive.classList.remove("active");
  $('.header__navbar-link[id="home"]').classList.add("active");
  loadContent();
};

headerNavbarLinks.forEach((itemLink) => {
  itemLink.onclick = function () {
    const itemLinkActive = $(".header__navbar-link.active");
    itemLinkActive.classList.remove("active");
    this.classList.add("active");
    const fileName = this.id;
    loadContent(fileName);
    window.innerWidth < 1024 && slideOut();
  };
});

// create shadow dom
class Content extends HTMLElement {
  constructor() {
    super();
    const shadowEl = this.attachShadow({ mode: "open" });

    // css for page
    const contentCss = document.createElement("link");
    contentCss.id = "content-css";
    contentCss.setAttribute("rel", "stylesheet");
    shadowEl.append(contentCss);

    // grid css
    const gridCss = document.createElement("link");
    gridCss.setAttribute("rel", "stylesheet");
    gridCss.setAttribute("href", "./assets/css/grid.css");
    shadowEl.append(gridCss);

    // responsive css
    const responsive = document.createElement("link");
    responsive.setAttribute("rel", "stylesheet");
    responsive.setAttribute("href", "./assets/css/responsive.css");
    shadowEl.append(responsive);

    // font awesome
    const fontAwesome = document.createElement("link");
    fontAwesome.setAttribute("rel", "stylesheet");
    fontAwesome.setAttribute(
      "href",
      "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    );
    fontAwesome.setAttribute(
      "integrity",
      "sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    );
    fontAwesome.setAttribute("crossorigin", "anonymous");
    fontAwesome.setAttribute("referrerpolicy", "no-referrer");
    shadowEl.append(fontAwesome);

    // main element contain html
    const contentEl = document.createElement("main");
    contentEl.id = "content";
    shadowEl.append(contentEl);

    // js for page
    const contentJs = document.createElement("script");
    contentJs.id = "content-js";
    shadowEl.append(contentJs);
  }
}
customElements.define("main-content", Content);
const content = new Content();

async function loadContent(fileName = "home") {
  _$("#content-css").setAttribute("href", `./assets/css/${fileName}.css`);
  const response = await fetch(`./pages/${fileName}.html`);
  const html = await response.text();
  _$("#content").innerHTML = html;
  _$("#content-js").setAttribute("src", `./assets/js/${fileName}.js`);
}
// end content

// load element in shadow dom
const container = $("main-content");
const _$ = container.shadowRoot.querySelector.bind(container.shadowRoot);
const _$$ = container.shadowRoot.querySelectorAll.bind(container.shadowRoot);

loadContent();
