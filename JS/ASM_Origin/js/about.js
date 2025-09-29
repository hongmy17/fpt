var $ = document.querySelector.bind(document),
  $$ = document.querySelectorAll.bind(document);

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
  imgToolbars[index].style.top = img.offsetHeight / 2 + "px";
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
    heartIcons[index].classList.toggle("active");

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
  };

  cartIcons[index].onclick = () => {
    cartIcons[index].classList.toggle("active");

    let grandParent = heartIcons[index].parentNode.parentNode;
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
    } else {
      itemObj.cartItems.splice(itemObj.cartItems.indexOf(item), 1);
      itemObj.cartIcons.splice(itemObj.cartIcons.indexOf(index), 1);
    }

    if (!localStorage.getItem("numItemsInCartList")) {
      localStorage.setItem("numItemsInCartList", JSON.stringify([1]));
    } else {
      let numItemsInCartList = JSON.parse(
        localStorage.getItem("numItemsInCartList")
      );
      numItemsInCartList.push(1);
      localStorage.setItem(
        "numItemsInCartList",
        JSON.stringify(numItemsInCartList)
      );
    }

    let price = Number(
      grandParent.querySelector(".gallery__food-price").innerText.substring(1)
    );
    let curPrice = Number(localStorage.getItem("total")) || 0;
    localStorage.setItem("itemObj", JSON.stringify(itemObj));
    localStorage.setItem("total", price + curPrice);
  };
});

window.onstorage = () => {
  itemObj = JSON.parse(localStorage.getItem("itemObj"));
  if (localStorage.getItem("heartIconRemoved")) {
    heartIcons[
      Number(localStorage.getItem("heartIconRemoved"))
    ].classList.remove("active");
    localStorage.removeItem("heartIconRemoved");
  } else if (localStorage.getItem("cartIconRemoved")) {
    cartIcons[Number(localStorage.getItem("cartIconRemoved"))].classList.remove(
      "active"
    );
    localStorage.removeItem("cartIconRemoved");
  }
};
