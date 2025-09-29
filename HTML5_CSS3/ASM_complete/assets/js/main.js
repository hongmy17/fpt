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
const headerNavbarMore = $(".header__navbar-more");
const headerNavBarOptions = $$(".header__navbar-option");
const headerNavbarHeartList = $(".header__navbar-heart-list .container-item");
const headerNavbarHeartListNoItemImg = $(
  ".header__navbar-heart-list-no-item-img"
);
const headerNavbarCartList = $(".header__navbar-cart-list .container-item");
const headerNavbarCartListNoItemImg = $(
  ".header__navbar-cart-list-no-item-img"
);
const cost = $(".header__navbar-cart-cost");
const headerNavbarCartBuyBtn = $(".header__navbar-cart-buy-btn");
const heartItemQuantity = $(".heart-item-quantity");
const cartItemQuantity = $(".cart-item-quantity");
const mobileTabletHeartItemQuantity = $(".mobile-tablet-heart-item-quantity");
const mobileTabletCartItemQuantity = $(".mobile-tablet-cart-item-quantity");

headerNavbarIcon.onclick = slideIn;
headerNavbarOverlay.onclick = slideOut;
headerNavbarCloseIcon.onclick = slideOut;

function slideIn() {
  headerNavbarOverlay.style.display = "block";
  headerNavbar.style.transform = "translateX(0)";
}

function slideOut() {
  headerNavbarOverlay.style.display = "none";
  headerNavbar.style.transform = "translateX(100%)";
}

headerNavbarMore.onclick = () => {
  headerNavBarOptions.forEach((option) => {
    if (window.innerWidth < 740) {
      option.classList.toggle("c-0");
      option.classList.toggle("c-12");
    } else {
      option.classList.toggle("m-0");
      option.classList.toggle("m-12");
    }
  });
};

window.onresize = function () {
  window.innerWidth >= 1024 ? slideIn() : slideOut();
  setOverflowYAuto(headerNavbarHeartList);
  setOverflowYAuto(headerNavbarCartList);
};

function removeItem() {
  let objStoreItem = JSON.parse(localStorage.getItem("objStoreItem"));
  const container = event.target.parentNode;

  if (!container.classList.contains("cart-item")) {
    const heartItems = objStoreItem.heartItems;
    for (let index = 0; index < heartItems.length; index++) {
      // <section class="col l-12 m-12 c-12 cart-item item data-index="0"> ... </section>
      //                                                      get this ⬆️
      const dataIndex = heartItems[index].charAt(
        heartItems[index].indexOf("data-index") + "data-index".length + 2
      );
      if (dataIndex == container.dataset.index) {
        // remove heart icon active nth index on page about
        iframe.contentWindow.document.body
          .querySelectorAll(".heart-icon")
          [container.dataset.index]?.classList.remove("active");

        objStoreItem.heartItems.splice(index, 1);
        headerNavbarHeartList.children[index].remove();
        objStoreItem.heartIcons.splice(index, 1);
        break;
      }
    }

    headerNavbarHeartListNoItemImg.style.display =
      headerNavbarHeartList.children.length > 0 ? "none" : "block";
    heartItemQuantity.innerText = headerNavbarHeartList.children.length;
    mobileTabletHeartItemQuantity.innerHTML =
      headerNavbarHeartList.children.length;
    setOverflowYAuto(headerNavbarHeartList);
  } else {
    const cartItems = objStoreItem.cartItems;
    let index = 0;
    for (; index < cartItems.length; index++) {
      const dataIndex = cartItems[index].charAt(
        cartItems[index].indexOf("data-index") + "data-index".length + 2
      );
      if (dataIndex == container.dataset.index) {
        iframe.contentWindow.document.body
          .querySelectorAll(".cart-icon")
          [container.dataset.index]?.classList.remove("active");

        objStoreItem.cartItems.splice(index, 1);
        break;
      }
    }

    objStoreItem.cartIcons.splice(index, 1);
    const arrQuantityWantBuyEachItem = JSON.parse(
      localStorage.getItem("arrQuantityWantBuyEachItem")
    );
    arrQuantityWantBuyEachItem.splice(index, 1);

    localStorage.setItem(
      "arrQuantityWantBuyEachItem",
      JSON.stringify(arrQuantityWantBuyEachItem)
    );

    let curCost = Number(cost.innerText);
    const price = container.querySelector(".item-price").innerText;
    let itemQuantity = container.querySelector(".quantity").innerText;
    curCost -= Number(price.substring(1)) * Number(itemQuantity);

    for (let i = 0; i < arrQuantityWantBuyEachItem.length; i++) {
      headerNavbarCartList.children[i].querySelector(".quantity").innerText =
        arrQuantityWantBuyEachItem[i];
    }

    cost.innerText = curCost;
    if (curCost == 0) localStorage.removeItem("cost");
    else localStorage.setItem("cost", curCost);
    headerNavbarCartList.children[index].remove();
    cartItemQuantity.innerText = headerNavbarCartList.children.length;
    mobileTabletCartItemQuantity.innerText =
      headerNavbarCartList.children.length;
    headerNavbarCartListNoItemImg.style.display =
      headerNavbarCartList.children.length > 0 ? "none" : "block";
    setOverflowYAuto(headerNavbarCartList);
  }

  localStorage.setItem("objStoreItem", JSON.stringify(objStoreItem));
}

function setOverflowYAuto(element) {
  element.style.overflowY = "";
  element.style.bottom = "";
  const maxHeightElement = window.innerHeight - 100 - 16;
  const currentElementHeight = element.offsetHeight;

  if (currentElementHeight > maxHeightElement) {
    element.style.overflowY = "auto";
    element.style.bottom = "50px";
  }
}

function getLocalStorage() {
  const objStoreItem = JSON.parse(localStorage.getItem("objStoreItem"));
  if (!objStoreItem) return;

  headerNavbarHeartList.innerHTML = objStoreItem.heartItems.join("");
  headerNavbarCartList.innerHTML = objStoreItem.cartItems.join("");

  heartItemQuantity.innerText = headerNavbarHeartList.children.length || 0;
  cartItemQuantity.innerText = headerNavbarCartList.children.length || 0;

  mobileTabletHeartItemQuantity.innerText =
    headerNavbarHeartList.children.length;
  mobileTabletCartItemQuantity.innerText = headerNavbarCartList.children.length;

  cost.innerText = localStorage.getItem("cost") || 0;
  headerNavbarHeartListNoItemImg.style.display =
    headerNavbarHeartList.children.length > 0 ? "none" : "block";
  headerNavbarCartListNoItemImg.style.display =
    headerNavbarCartList.children.length > 0 ? "none" : "block";

  if (
    JSON.parse(localStorage.getItem("arrQuantityWantBuyEachItem"))?.length > 0
  ) {
    const arrQuantityWantBuyEachItem = JSON.parse(
      localStorage.getItem("arrQuantityWantBuyEachItem")
    );

    for (let i = 0; i < arrQuantityWantBuyEachItem.length; i++) {
      headerNavbarCartList.children[i].querySelector(".quantity").innerText =
        arrQuantityWantBuyEachItem[i];
    }
  }
}
getLocalStorage();

function decrease() {
  // event.stopPropagation();
  const itemQuantity = event.target.parentNode.nextElementSibling;
  let curItemQuantity = Number(itemQuantity.innerText);
  if (curItemQuantity <= 0) return;
  const container = event.target.parentNode.parentNode.parentNode;

  itemQuantity.innerText = --curItemQuantity;
  cost.innerText =
    Number(cost.innerText) -
    Number(container.querySelector(".item-price").innerText.substring(1));
  localStorage.setItem("cost", cost.innerText);

  // let curIndex = Array.prototype.indexOf.call(headerNavbarCartList.children, container);
  const curIndex = Array.from(headerNavbarCartList.children).indexOf(container);
  updateArrQuantityWantBuyEachItem(curIndex, curItemQuantity);
}

function increase() {
  event.stopPropagation();
  let itemQuantity = event.target.parentNode.previousElementSibling;
  let curItemQuantity = Number(itemQuantity.innerText);
  const container = event.target.parentNode.parentNode.parentNode;

  itemQuantity.innerText = ++curItemQuantity;
  cost.innerText =
    Number(cost.innerText) +
    Number(container.querySelector(".item-price").innerText.substring(1));
  localStorage.setItem("cost", cost.innerText);

  // let curIndex = Array.prototype.indexOf.call(headerNavbarCartList.children, container);
  const curIndex = Array.from(headerNavbarCartList.children).indexOf(container);
  updateArrQuantityWantBuyEachItem(curIndex, curItemQuantity);
}

function updateArrQuantityWantBuyEachItem(index, val) {
  const arrQuantityWantBuyEachItem = JSON.parse(
    localStorage.getItem("arrQuantityWantBuyEachItem")
  );
  arrQuantityWantBuyEachItem[index] = val;
  localStorage.setItem(
    "arrQuantityWantBuyEachItem",
    JSON.stringify(arrQuantityWantBuyEachItem)
  );
}

headerNavbarCartBuyBtn.onclick = function () {
  const announceCloseButtons = $$(".announce .close-btn");
  const announceNoItem = $(".announce-no-item");
  const announceNoQuantity = $(".announce-no-quantity");

  if (headerNavbarCartList.children.length === 0) {
    translateRight(announceNoItem, 0);

    transLateTimeOut = setTimeout(() => {
      translateRight(announceNoItem, 150);
    }, 2000);
  } else {
    if (localStorage.getItem("cost") == 0) {
      translateRight(announceNoQuantity, 0);

      transLateTimeOut = setTimeout(() => {
        translateRight(announceNoQuantity, 150);
      }, 2000);
    } else {
      function translateY(element, val = "") {
        element.style.top = val;
      }

      const announceAddress = $(".announce-address");
      const announceAddressInput = $(".announce-address .address");
      const announceAddressConfirmBtn = $(".announce-address .confirm-btn");
      announceAddressConfirmBtn.style.marginRight =
        announceAddressInput.offsetLeft + "px";
      translateY(announceAddress, 0);

      announceAddress.onclick = (e) => {
        if (e.target.matches(".announce-address")) translateY(announceAddress);
      };

      announceAddressConfirmBtn.onclick = function () {
        if (announceAddressInput.value.trim() === "") {
          announceAddressInput.style.borderLeft = "5px solid red";
        } else {
          announceAddressInput.style.borderLeft = "";
          translateY(announceAddress);

          const announceSuccessBuy = $(".announce-success-buy");
          translateY(announceSuccessBuy, 0);

          announceSuccessBuy.onclick = (e) => {
            if (e.target.matches(".announce-success-buy"))
              translateY(announceSuccessBuy);
          };

          setTimeout(() => {
            translateY(announceSuccessBuy);
          }, 2000);
        }
      };
    }
  }

  announceCloseButtons.forEach((closeBtn, index) => {
    closeBtn.onclick = () => {
      if (!index) translateRight(announceNoItem, 150);
      else translateRight(announceNoQuantity, 150);
    };
  });
};

function translateRight(element, val) {
  element.style.transform = `translateX(${val}%)`;
}
// end header

// content
const iframe = $("iframe");
iframe.style.marginTop = $(".header").clientHeight + "px";
iframe.onload = () => {
  iframe.style.height = iframe.contentWindow.document.body.offsetHeight + "px";
};

window.onload = function () {
  setOverflowYAuto(headerNavbarHeartList);
  setOverflowYAuto(headerNavbarCartList);
};

headerLogoLink.onclick = function () {
  const itemLinkActive = $(".header__navbar-link.active");
  itemLinkActive.classList.remove("active");
  $('.header__navbar-link[id="home"]').classList.add("active");
};

headerNavbarLinks.forEach((itemLink) => {
  itemLink.onclick = function () {
    const itemLinkActive = $(".header__navbar-link.active");
    itemLinkActive.classList.remove("active");
    this.classList.add("active");
    window.innerWidth < 1024 &&
      !this.parentNode.classList.contains("header__navbar-more") &&
      !this.parentNode.classList.contains("header__navbar-option") &&
      slideOut();
  };
});
// end content
