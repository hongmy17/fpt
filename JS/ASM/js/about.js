var $ = document.querySelector.bind(document),
  $$ = document.querySelectorAll.bind(document);

let windowParent = window.parent.document.body;
let loveList = windowParent.querySelector(".love-list"),
  cartList = windowParent.querySelector(".cart-list");

// about
let video = $("video"),
  playBtn = $(".play-btn"),
  pauseBtn = $(".pause-btn");
let removeTimeout;

playBtn.onclick = () => {
  video.play();
  playBtn.classList.remove("active");
  pauseBtn.classList.add("active");

  removeTimeout = setTimeout(() => {
    pauseBtn.classList.remove("active");
  }, 1000);
};

video.onmouseenter = () => {
  if (!video.paused) {
    pauseBtn.classList.add("active");

    removeTimeout = setTimeout(() => {
      pauseBtn.classList.remove("active");
    }, 2000);
  }
};

pauseBtn.onclick = () => {
  video.pause();
  pauseBtn.classList.remove("active");
  playBtn.classList.add("active");
  clearTimeout(removeTimeout);
};

// gallery
let imgs = $$(".gallery__food-img"),
  imgToolbars = $$(".img-toolbar"),
  heartIcons = $$(".heart-icon"),
  cartIcons = $$(".cart-icon");

window.onload = () => {
  for (let i = 0; i < imgToolbars.length; i++)
    imgToolbars[i].style.top = imgs[i].offsetHeight / 2 + "px";
};

let itemObj = JSON.parse(localStorage.getItem("itemObj")) || {
  loveItems: [],
  cartItems: [],
  heartIcons: [],
  cartIcons: [],
};

if (localStorage.getItem("itemObj")) {
  let store = JSON.parse(localStorage.getItem("itemObj"));
  if (store.heartIcons) {
    itemObj.heartIcons = store.heartIcons;
    store.heartIcons.forEach((index) => {
      heartIcons[index].classList.add("active");
    });
  }

  if (store.cartIcons) {
    itemObj.cartIcons = store.cartIcons;
    store.cartIcons.forEach((index) => {
      cartIcons[index].classList.add("active");
    });
  }
} else {
  for (let i = 0; i < heartIcons.length; i++) {
    heartIcons[i].classList.remove("active");
    cartIcons[i].classList.remove("active");
  }
}

function createItem(grandParent, index) {
  return `
    <li class="sub-list-item" data-index="${index}">
      <i class="fa-solid fa-trash trash-icon" onclick="removeItem()"></i>
      <img src="${
        grandParent.querySelector(".gallery__food-img").src
      }" class="img" />

      <ul class="text">
        <li class="title">
          ${grandParent.querySelector(".gallery__food-title").innerText}
        </li>
        <li class="price">
          ${grandParent.querySelector(".gallery__food-price").innerText}</li>
      </ul>
    </li>`;
}

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

  heartIcons[index].onclick = () => {
    itemObj = JSON.parse(localStorage.getItem("itemObj")) || {
      loveItems: [],
      cartItems: [],
      heartIcons: [],
      cartIcons: [],
    };

    heartIcons[index].classList.toggle("active");
    let numItemsLove = windowParent.querySelector(".num-items-love");

    let grandParent = heartIcons[index].parentNode.parentNode;
    let item = createItem(grandParent, index);

    if (heartIcons[index].classList.contains("active")) {
      itemObj.loveItems.push(item);
      itemObj.heartIcons.push(index);
    } else {
      itemObj.loveItems.splice(itemObj.loveItems.indexOf(item), 1);
      itemObj.heartIcons.splice(itemObj.heartIcons.indexOf(index), 1);
    }

    localStorage.setItem("itemObj", JSON.stringify(itemObj));
    loveList.innerHTML = itemObj.loveItems.join("");
    numItemsLove.innerText = loveList.children.length;
  };

  cartIcons[index].onclick = () => {
    itemObj = JSON.parse(localStorage.getItem("itemObj")) || {
      loveItems: [],
      cartItems: [],
      heartIcons: [],
      cartIcons: [],
    };

    cartIcons[index].classList.toggle("active");
    let numItemsCart = windowParent.querySelector(".num-items-cart");

    let grandParent = heartIcons[index].parentNode.parentNode;
    let cost = windowParent.querySelector(".cost");
    let price = Number(
        grandParent.querySelector(".gallery__food-price").innerText.substring(1)
      ),
      curCost = Number(cost.innerText);
    let arrQuantityWantBuyEachItem = JSON.parse(
      localStorage.getItem("arrQuantityWantBuyEachItem")
    );
    let item = createItem(grandParent, index);

    item =
      item.slice(0, -6) +
      `<div class="wrapper-quantity">
        <i class="fa-solid fa-minus control-icon" onclick="decrease()"></i>
        <span class="num">1</span>
        <i class="fa-solid fa-plus control-icon" onclick="increase()"></i>
      </div>` +
      `</li>`;

    if (cartIcons[index].classList.contains("active")) {
      itemObj.cartItems.push(item);
      itemObj.cartIcons.push(index);
      curCost += price;

      if (!localStorage.getItem("arrQuantityWantBuyEachItem")) {
        localStorage.setItem("arrQuantityWantBuyEachItem", JSON.stringify([1]));
      } else {
        arrQuantityWantBuyEachItem.push(1);
        localStorage.setItem(
          "arrQuantityWantBuyEachItem",
          JSON.stringify(arrQuantityWantBuyEachItem)
        );
      }
    } else {
      itemObj.cartItems.splice(itemObj.cartItems.indexOf(item), 1);
      itemObj.cartIcons.splice(itemObj.cartIcons.indexOf(index), 1);

      let elementRemoved = windowParent.querySelector(
        `.cart-list .sub-list-item[data-index="${index}"]`
      );
      num = elementRemoved.querySelector(".num").innerText;
      curCost -= Number(price) * Number(num);

      arrQuantityWantBuyEachItem.splice(
        arrQuantityWantBuyEachItem.indexOf(Number(num)),
        1
      );
      localStorage.setItem(
        "arrQuantityWantBuyEachItem",
        JSON.stringify(arrQuantityWantBuyEachItem)
      );
    }

    localStorage.setItem("itemObj", JSON.stringify(itemObj));
    cartList.innerHTML = itemObj.cartItems.join("");
    cost.innerHTML = curCost;
    if (curCost == 0) localStorage.removeItem("cost");
    else localStorage.setItem("cost", curCost);
    numItemsCart.innerText = cartList.children.length;

    for (let i = 0; i < arrQuantityWantBuyEachItem.length; i++) {
      cartList.children[i].querySelector(".num").innerText =
        arrQuantityWantBuyEachItem[i];
    }
  };
});
