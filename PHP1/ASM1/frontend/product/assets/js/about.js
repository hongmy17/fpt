const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const windowParent = window.parent.document.body;

// about
const video = $(".about-video video");
const playBtn = $(".about-video .play-btn");
const pauseBtn = $(".about-video .pause-btn");

playBtn.onclick = function () {
  playBtn.classList.remove("active");
  pauseBtn.classList.add("active");
  video.play();
  setTimeout(() => {
    pauseBtn.classList.remove("active");
  }, 2000);
};

video.onclick = function () {
  if (!video.paused) {
    pauseBtn.classList.toggle("active");
  }
};

pauseBtn.onclick = function () {
  pauseBtn.classList.remove("active");
  playBtn.classList.add("active");
  video.pause();
};

// gallery
window.onload = function () {
  const imgToolbars = $$(".img-toolbar");
  $$(".gallery__food-text").forEach((text, index) => {
    imgToolbars[index].style.bottom = text.offsetHeight + 10 + "px";
  });
};

const heartIcons = $$(".img-toolbar .heart-icon");
const cartIcons = $$(".img-toolbar .cart-icon");
const headerNavbarHeartList = windowParent.querySelector(
  ".header__navbar-heart-list .container-item"
);
const headerNavbarHeartListNoItemImg = windowParent.querySelector(
  ".header__navbar-heart-list-no-item-img"
);
const headerNavbarCartList = windowParent.querySelector(
  ".header__navbar-cart-list .container-item"
);
const headerNavbarCartListNoItemImg = windowParent.querySelector(
  ".header__navbar-cart-list-no-item-img"
);

let objStoreItem = JSON.parse(localStorage.getItem("objStoreItem")) || {
  heartItems: [],
  cartItems: [],
  heartIcons: [],
  cartIcons: [],
};

objStoreItem.heartIcons.forEach((index) => {
  heartIcons[index].classList.add("active");
});

objStoreItem.cartIcons.forEach((index) => {
  cartIcons[index].classList.add("active");
});

heartIcons.forEach(function (heartIcon, index) {
  heartIcon.onclick = function () {
    objStoreItem = JSON.parse(localStorage.getItem("objStoreItem")) || {
      heartItems: [],
      cartItems: [],
      heartIcons: [],
      cartIcons: [],
    };

    this.classList.toggle("active");
    const container = this.parentNode.parentNode;
    const item = createItem(container, index, false);
    const heartItemQuantity = windowParent.querySelector(
      ".heart-item-quantity"
    );

    if (this.classList.contains("active")) {
      objStoreItem.heartItems.push(item);
      objStoreItem.heartIcons.push(index);
      headerNavbarHeartList.innerHTML += item;
    } else {
      const indexRemoved = objStoreItem.heartItems.indexOf(item);
      objStoreItem.heartItems.splice(indexRemoved, 1);
      objStoreItem.heartIcons.splice(indexRemoved, 1);
      headerNavbarHeartList.children[indexRemoved].remove();
    }

    localStorage.setItem("objStoreItem", JSON.stringify(objStoreItem));
    heartItemQuantity.innerText = headerNavbarHeartList.children.length;
    headerNavbarHeartListNoItemImg.style.display =
      headerNavbarHeartList.children.length > 0 ? "none" : "block";
    setOverflowYAuto(headerNavbarHeartList);
  };
});

cartIcons.forEach(function (cartIcon, index) {
  cartIcon.onclick = function () {
    this.classList.toggle("active");
    const container = this.parentNode.parentNode;
    const item = createItem(container, index, true);
    const cartItemQuantity = windowParent.querySelector(".cart-item-quantity");
    const cost = windowParent.querySelector(".header__navbar-cart-cost");
    const price = +container
      .querySelector(".gallery__food-price")
      .innerText.substring(1); // + is convert to number
    let curCost = +cost.innerText;
    const arrQuantityWantBuyEachItem =
      JSON.parse(localStorage.getItem("arrQuantityWantBuyEachItem")) || [];

    if (this.classList.contains("active")) {
      objStoreItem.cartItems.push(item);
      objStoreItem.cartIcons.push(index);
      headerNavbarCartList.innerHTML += item;
      curCost += price;

      if (!localStorage.getItem("arrQuantityWantBuyEachItem")) {
        localStorage.setItem("arrQuantityWantBuyEachItem", JSON.stringify([1]));
        arrQuantityWantBuyEachItem.push(1);
      } else {
        arrQuantityWantBuyEachItem.push(1);
        localStorage.setItem(
          "arrQuantityWantBuyEachItem",
          JSON.stringify(arrQuantityWantBuyEachItem)
        );
      }
    } else {
      const indexRemoved = objStoreItem.cartItems.indexOf(item);
      objStoreItem.cartItems.splice(indexRemoved, 1);
      objStoreItem.cartIcons.splice(indexRemoved, 1);

      const elementRemoved = windowParent.querySelector(
        `.cart-item[data-index="${index}"]`
      );
      const itemQuantity = +elementRemoved.querySelector(".quantity").innerText;
      curCost -= price * itemQuantity;

      arrQuantityWantBuyEachItem.splice(
        arrQuantityWantBuyEachItem.indexOf(Number(itemQuantity)),
        1
      );
      localStorage.setItem(
        "arrQuantityWantBuyEachItem",
        JSON.stringify(arrQuantityWantBuyEachItem)
      );
      headerNavbarCartList.children[indexRemoved].remove();
    }

    localStorage.setItem("objStoreItem", JSON.stringify(objStoreItem));
    cost.innerHTML = curCost;
    if (curCost == 0) localStorage.removeItem("cost");
    else localStorage.setItem("cost", curCost);
    cartItemQuantity.innerText = headerNavbarCartList.children.length;
    headerNavbarCartListNoItemImg.style.display =
      headerNavbarCartList.children.length > 0 ? "none" : "block";

    for (let i = 0; i < arrQuantityWantBuyEachItem.length; i++) {
      headerNavbarCartList.children[i].querySelector(".quantity").innerText =
        arrQuantityWantBuyEachItem[i];
    }
    setOverflowYAuto(headerNavbarCartList);
  };
});

function setOverflowYAuto(element) {
  element.style.overflowY = "";
  element.style.bottom = "";
  const maxHeightElement = window.parent.window.innerHeight - 100 - 16;
  const currentElementHeight = element.offsetHeight;

  if (currentElementHeight > maxHeightElement) {
    element.style.overflowY = "auto";
    element.style.bottom = "50px";
  }
}

function createItem(container, index, isCartIcon) {
  let title = container.querySelector(".gallery__food-title").innerText;
  title = title.slice(0, title.indexOf("$"));

  return `
    <section 
      class="col l-12 m-12 c-12 
      ${isCartIcon ? "cart-item" : ""} 
      item" data-index="${index}"
    >
      <i class="fa-solid fa-trash remove-icon" onclick="removeItem()"></i>
      ${
        isCartIcon
          ? `<section class="container-quantity">
              <span class="minus"><i class="fa-solid fa-minus" onclick="decrease()"></i></span>
              <span class="quantity">1</span>
              <span class="plus"><i class="fa-solid fa-plus" onclick="increase()"></i></span>
            </section>`
          : ""
      }

      <section class="item-image">
        <img
          src="${container.querySelector(".gallery__food-img").src}"
          class="item-img"
        />
      </section>

      <section class="item-content">
        <h3 class="item-title">${title}</h3>
        <p class="item-text">${
          container.querySelector(".gallery__food-desc").innerText
        }</p>
        <p class="item-price">${
          container.querySelector(".gallery__food-price").innerText
        }</p>
      </section>
    </section>`;
}
