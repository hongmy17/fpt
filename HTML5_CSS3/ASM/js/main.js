const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const menuItems = $$(".header__menu a:not([href='#'])");
const subLists = $$(".sub-list");
const contentELe = $(".content");

contentELe.style.marginTop = $(".header").clientHeight + "px";

menuItems.forEach((item) => {
  item.onclick = () => {
    $(".header__menu a.active").classList.remove("active");
    $(".container-sub-list.active a")?.click();

    fetch(`page/${item.className}.html`)
      .then((response) => response.text())
      .then((html) => {
        contentELe.innerHTML = html;
      })
      .then(() => {
        item.classList.add("active");
      });
  };
});

let loveList = $(".love-list"),
  cartList = $(".cart-list"),
  numItemsLove = $(".num-items-love"),
  numItemsCart = $(".num-items-cart"),
  cost = $(".cost"),
  buyBtn = $(".buy-btn");

function removeItem() {
  event.stopPropagation();
  let objStoreItem = JSON.parse(localStorage.getItem("objStoreItem"));
  let parent = event.target.parentNode;

  //  loveItems = ['<li class="sub-list-item" data-index="${index}"> ... </li>', ...]
  // 43 is index of data-index
  if (parent.parentNode.classList.contains("love-list")) {
    let loveItems = objStoreItem.loveItems;
    for (let index = 0; index < loveItems.length; index++)
      if (loveItems[index].charAt(43) == parent.dataset.index) {
        // remove heart icon active index th on page about
        // iframe.contentWindow.document.body
        //   .querySelectorAll(".heart-icon")
        //   [parent.dataset.index]?.classList.remove("active");

        objStoreItem.loveItems.splice(index, 1);
        loveList.children[index].remove();
        objStoreItem.heartIcons.splice(index, 1);
        break;
      }

    numItemsLove.innerText = loveList.children.length;
  } else {
    let cartItems = objStoreItem.cartItems;
    let index = 0;
    for (; index < cartItems.length; index++) {
      if (cartItems[index].charAt(43) == parent.dataset.index) {
        // iframe.contentWindow.document.body
        //   .querySelectorAll(".cart-icon")
        //   [parent.dataset.index]?.classList.remove("active");

        objStoreItem.cartItems.splice(index, 1);
        break;
      }
    }

    objStoreItem.cartIcons.splice(index, 1);
    let arrQuantityWantBuyEachItem = JSON.parse(
      localStorage.getItem("arrQuantityWantBuyEachItem")
    );
    arrQuantityWantBuyEachItem.splice(index, 1);

    localStorage.setItem(
      "arrQuantityWantBuyEachItem",
      JSON.stringify(arrQuantityWantBuyEachItem)
    );

    let curCost = Number(cost.innerText);
    let price = parent.querySelector(".price").innerText,
      num = parent.querySelector(".num").innerText;
    curCost -= Number(price.substring(1)) * Number(num);

    for (let i = 0; i < arrQuantityWantBuyEachItem.length; i++) {
      cartList.children[i].querySelector(".num").innerText =
        arrQuantityWantBuyEachItem[i];
    }

    cost.innerText = curCost;
    if (curCost == 0) localStorage.removeItem("cost");
    else localStorage.setItem("cost", curCost);
    cartList.children[index].remove();
    numItemsCart.innerText = cartList.children.length;
  }

  localStorage.setItem("objStoreItem", JSON.stringify(objStoreItem));
}

subLists.forEach((subList) => {
  let parent = subList.parentNode,
    grandParent = parent.parentNode,
    titleList = parent.previousElementSibling,
    numItems = titleList.previousElementSibling,
    isFinishedScroll = false;

  grandParent.onclick = (e) => {
    if (e.target.tagName.toLowerCase() === "a") {
      e.preventDefault(); // prevent auto go to top page
      if (grandParent.classList.contains("active")) {
        if (isFinishedScroll) {
          grandParent.classList.remove("active");
          parent.style.height = "";
          parent.style.overflow = "";
          subList.style.height = "";
          titleList.classList.remove("active");
          numItems.classList.remove("active");
          isFinishedScroll = false;
        }
      } else {
        $(".container-sub-list.active a")?.click();
        grandParent.classList.add("active");
        parent.style.height =
          (subList.classList.contains("love-list") ? 150 : 175) + "px";

        subList.style.height = 100 + "px";
        titleList.classList.add("active");
        numItems.classList.add("active");

        setTimeout(() => {
          parent.style.overflow = "inherit";
          isFinishedScroll = true;
        }, 300);
      }
    }
  };
});

function getLocalStorage() {
  let objStoreItem = JSON.parse(localStorage.getItem("objStoreItem"));
  if (!objStoreItem) return;

  loveList.innerHTML = objStoreItem.loveItems.join("");
  cartList.innerHTML = objStoreItem.cartItems.join("");
  numItemsLove.innerHTML = loveList.children.length || 0;
  numItemsCart.innerHTML = cartList.children.length || 0;
  cost.innerText = localStorage.getItem("cost") || 0;

  if (
    JSON.parse(localStorage.getItem("arrQuantityWantBuyEachItem"))?.length > 0
  ) {
    let arrQuantityWantBuyEachItem = JSON.parse(
      localStorage.getItem("arrQuantityWantBuyEachItem")
    );

    for (let i = 0; i < arrQuantityWantBuyEachItem.length; i++) {
      cartList.children[i].querySelector(".num").innerText =
        arrQuantityWantBuyEachItem[i];
    }
  }
}
getLocalStorage();

function decrease() {
  event.stopPropagation();
  let nextEle = event.target.nextElementSibling;
  let curNum = Number(nextEle.innerText);
  if (curNum <= 0) return;
  let grandParent = event.target.parentNode.parentNode;

  nextEle.innerText = --curNum;
  cost.innerText =
    Number(cost.innerText) -
    Number(grandParent.querySelector(".price").innerText.substring(1));
  localStorage.setItem("cost", cost.innerText);

  // let curIndex = Array.prototype.indexOf.call(cartList.children, grandParent);
  let curIndex = Array.from(cartList.children).indexOf(grandParent);
  updateArrQuantityWantBuyEachItem(curIndex, curNum);
}

function increase() {
  event.stopPropagation();
  let prevEle = event.target.previousElementSibling;
  let curNum = Number(prevEle.innerText);
  let grandParent = event.target.parentNode.parentNode;

  prevEle.innerText = ++curNum;
  cost.innerText =
    Number(cost.innerText) +
    Number(grandParent.querySelector(".price").innerText.substring(1));
  localStorage.setItem("cost", cost.innerText);

  // let curIndex = Array.prototype.indexOf.call(cartList.children, grandParent);
  let curIndex = Array.from(cartList.children).indexOf(grandParent);
  updateArrQuantityWantBuyEachItem(curIndex, curNum);
}

function updateArrQuantityWantBuyEachItem(index, val) {
  let arrQuantityWantBuyEachItem = JSON.parse(
    localStorage.getItem("arrQuantityWantBuyEachItem")
  );
  arrQuantityWantBuyEachItem[index] = val;
  localStorage.setItem(
    "arrQuantityWantBuyEachItem",
    JSON.stringify(arrQuantityWantBuyEachItem)
  );
}

buyBtn.onclick = (e) => {
  e.stopPropagation();
  let announceNoItem = $(".announce-no-item"),
    announceNoQuantity = $(".announce-no-quantity"),
    closeBtns = $$(".close-btn"),
    transLateTimeOut;

  if (!cartList.children.length) {
    clearTimeout(transLateTimeOut);
    translateRight(announceNoItem, 0);

    transLateTimeOut = setTimeout(() => {
      translateRight(announceNoItem, 150);
    }, 2000);
  } else {
    if (localStorage.getItem("cost") == 0) {
      clearTimeout(transLateTimeOut);
      translateRight(announceNoQuantity, 0);

      transLateTimeOut = setTimeout(() => {
        translateRight(announceNoQuantity, 150);
      }, 2000);
    } else {
      function translateY(element, val = "") {
        element.style.top = val;
      }

      let announceAddress = $(".announce-address");
      translateY(announceAddress, 0);

      announceAddress.onclick = (e) => {
        if (e.target.matches(".announce-address")) translateY(announceAddress);
      };

      let confirmBtn = $(".confirm-btn");
      confirmBtn.onclick = () => {
        let address = $(".address");
        if (address.value.trim() === "") {
          address.style.borderLeft = "5px solid red";
        } else {
          address.style.borderLeft = "";
          translateY(announceAddress);

          let announceSuccessBuy = $(".announce-success-buy");
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

  closeBtns.forEach((closeBtn, index) => {
    closeBtn.onclick = () => {
      clearTimeout(transLateTimeOut);
      if (!index) translateRight(announceNoItem, 150);
      else translateRight(announceNoQuantity, 150);
    };
  });
};

function translateRight(element, val) {
  element.style.transform = `translateX(${val}%)`;
}
