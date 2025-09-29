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

let loveList = $(".love-list"),
  cartList = $(".cart-list"),
  numItemsLove = $(".num-items-love"),
  numItemsCart = $(".num-items-cart"),
  total = $(".total"),
  buyBtn = $(".buy-btn");

function removeItem() {
  let itemObj = JSON.parse(localStorage.getItem("itemObj"));
  let parent = event.target.parentNode;

  // 43 is index of value of data-index
  if (parent.parentNode.classList.contains("love-list")) {
    let loveItems = itemObj.loveItems;
    for (let index = 0; index < loveItems.length; index++)
      if (loveItems[index].charAt(43) == parent.dataset.index) {
        itemObj.loveItems.splice(index, 1);
        break;
      }

    itemObj.heartIcons.splice(
      itemObj.heartIcons.indexOf(parent.dataset.index),
      1
    );
    localStorage.setItem("heartIconRemoved", parent.dataset.index);
  } else {
    let cartItems = itemObj.cartItems;
    for (let index = 0; index < cartItems.length; index++)
      if (cartItems[index].charAt(43) == parent.dataset.index) {
        itemObj.cartItems.splice(index, 1);
        break;
      }

    let curIndex = itemObj.cartIcons.indexOf(Number(parent.dataset.index));
    itemObj.cartIcons.splice(curIndex, 1);
    let numItemsInCartList = JSON.parse(
      localStorage.getItem("numItemsInCartList")
    );
    numItemsInCartList.splice(curIndex, 1);

    curTotal = Number(total.innerText);
    let price = parent.querySelector(".price").innerText,
      num = parent.querySelector(".num").innerText;
    curTotal -= Number(price.substring(1)) * Number(num);

    localStorage.setItem(
      "numItemsInCartList",
      JSON.stringify(numItemsInCartList)
    );
    localStorage.setItem("total", curTotal);
    localStorage.setItem("cartIconRemoved", parent.dataset.index);
  }

  localStorage.setItem("itemObj", JSON.stringify(itemObj));
  render();
}

function scroll(item) {
  let parent = item.parentNode,
    grandParent = parent.parentNode,
    titleList = parent.previousElementSibling,
    numItems = titleList.previousElementSibling;

  grandParent.onmouseenter = () => {
    let moreHeight = 0;
    if (item.classList.contains("cart-list")) moreHeight = 25;

    parent.style.height = 150 + moreHeight + "px";
    item.style.height = 100 + "px";
    titleList.classList.add("active");
    numItems.classList.add("active");

    setTimeout(() => {
      parent.style.overflow = "inherit";
    }, 300);
  };

  grandParent.onmouseleave = () => {
    parent.style.height = "";
    parent.style.overflow = "";
    item.style.height = "";

    titleList.classList.remove("active");
    numItems.classList.remove("active");
  };
}

scroll(loveList);
scroll(cartList);

window.onstorage = () => {
  render();
};

function render() {
  let store = JSON.parse(localStorage.getItem("itemObj"));
  if (!store) return;

  loveList.innerHTML = store.loveItems.join("");
  cartList.innerHTML = store.cartItems.join("");
  numItemsLove.innerHTML = store.loveItems?.length || 0;
  numItemsCart.innerHTML = store.cartItems?.length || 0;

  if (!store.cartIcons.length) {
    total.innerText = 0;
    localStorage.removeItem("total");
  } else {
    total.innerText = localStorage.getItem("total");
  }

  if (JSON.parse(localStorage.getItem("numItemsInCartList"))?.length > 0) {
    let numItemsInCartList = JSON.parse(
      localStorage.getItem("numItemsInCartList")
    );

    for (let i = 0; i < numItemsInCartList.length; i++) {
      cartList.children[i].querySelector(".num").innerText =
        numItemsInCartList[i];
    }
  }
}
render();

function decrease() {
  let nextEle = event.target.nextElementSibling;
  let curNum = Number(nextEle.innerText);
  if (curNum <= 0) return;
  let grandParent = event.target.parentNode.parentNode;

  nextEle.innerText = --curNum;
  total.innerText =
    Number(total.innerText) -
    Number(grandParent.querySelector(".price").innerText.substring(1));
  localStorage.setItem("total", total.innerText);

  let curIndex = Array.prototype.indexOf.call(cartList.children, grandParent);
  updateNumItemsInCartList(curIndex, curNum);
}

function increase() {
  let prevEle = event.target.previousElementSibling;
  let curNum = Number(prevEle.innerText);
  let grandParent = event.target.parentNode.parentNode;

  prevEle.innerText = ++curNum;
  total.innerText =
    Number(total.innerText) +
    Number(grandParent.querySelector(".price").innerText.substring(1));
  localStorage.setItem("total", total.innerText);

  let curIndex = Array.prototype.indexOf.call(cartList.children, grandParent);
  updateNumItemsInCartList(curIndex, curNum);
}

function updateNumItemsInCartList(index, val) {
  let numItemsInCartList = JSON.parse(
    localStorage.getItem("numItemsInCartList")
  );
  numItemsInCartList[index] = val;
  localStorage.setItem(
    "numItemsInCartList",
    JSON.stringify(numItemsInCartList)
  );
}

buyBtn.onclick = () => {
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
    if (localStorage.getItem("total") == 0) {
      clearTimeout(transLateTimeOut);
      translateRight(announceNoQuantity, 0);

      transLateTimeOut = setTimeout(() => {
        translateRight(announceNoQuantity, 150);
      }, 2000);
    } else {
      function translateY(element, val = "") {
        element.style.top = val;
      }

      let overlayAddress = $(".overlay-address");
      translateY(overlayAddress, 0);

      overlayAddress.onclick = (e) => {
        if (e.target.matches(".overlay-address")) translateY(overlayAddress);
      };

      let confirmBtn = $(".confirm-btn");
      confirmBtn.onclick = () => {
        let address = $(".address");
        if (address.value.trim() === "") {
          address.style.borderLeft = "5px solid red";
        } else {
          address.style.borderLeft = "";
          translateY(overlayAddress);

          let overlaySuccess = $(".overlay-success");
          translateY(overlaySuccess, 0);

          overlaySuccess.onclick = (e) => {
            if (e.target.matches(".overlay-success"))
              translateY(overlaySuccess);
          };

          setTimeout(() => {
            translateY(overlaySuccess);
          }, 3000);
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
