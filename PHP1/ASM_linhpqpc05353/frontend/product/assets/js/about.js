$('.header__navbar-link[href*="about.php"]').classList.add("active");
const contentEle = $("#content");
contentEle.style.marginTop = header.clientHeight + "px";

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

const cartIcons = $$(".img-toolbar .cart-icon");
const headerNavbarCartListNoItemImg = $(
  ".header__navbar-cart-list-no-item-img"
);
const products = $$(".gallery__food");

function getProductRelate(id) {
  const productRelate = $(".products-relate");
  const formData = new FormData();
  formData.append("pd_id", id);

  fetch(baseUrl + "get-product-relate.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((products) => (productRelate.innerHTML = products))
    .then(() => {
      const productsRelate = $$(".product-relate");
      productsRelate.forEach((productRelate) => {
        productRelate.onclick = function () {
          $(
            `.col.gallery__food[pd-id='${this.getAttribute("pd-id")}']`
          ).click();
        };
      });
    });
}

products.forEach(function (product, index) {
  product.onclick = function () {
    const productDetail = $(".product-detail");

    const id = this.getAttribute("pd-id");
    const title = this.querySelector(".gallery__food-title").innerText;
    const img = this.querySelector(".gallery__food-img").src;
    const desc = this.querySelector(".gallery__food-desc").innerText;
    const price = this.querySelector(".gallery__food-price").innerText;
    const type = this.querySelector(".gallery__food-type").innerText;
    let isActive =
      this.querySelector(".cart-icon").classList.contains("active");

    productDetail.innerHTML = `
      <div class="product-container">
        <i class="fa-solid fa-xmark close-btn"></i>
        <h1 class="product-detail-title">${title}</h1>
        <h2 class='text-center'>Thể loại: ${type}</h3>
        <hr style="height: 2px; background-color: #000" />

        <div class="product-detail-content">
          <img src="${img}" alt="" class="product-detail-img" />
          <div class="product-detail-info">
            <div class="product-detail-price">
              <strong>Giá:</strong>
              <span style="font-size: 24px; font-weight: 600">
                ${price}
              </span>
            </div>

            <div class="product-detail-desc" style="text-align: justify">
              <strong> Mô tả: </strong>
              ${desc}
            </div>
            ${
              isActive
                ? `<button class="delete-from-cart-btn product-detail-btn">
                Xóa khỏi giỏ hàng
              </button>`
                : `<button class="add-to-cart-btn product-detail-btn">
                Thêm vào giỏ hàng
              </button>`
            }
          </div>
        </div>
        
        <h1 style="margin-top: 20px">San pham lien quan: </h1>
        <div 
          class="products-relate" 
          style='display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px'>
        </div>
      </div>`;

    getProductRelate(id);

    translateY(productDetail, 0);
    productDetail.style.overflowY = "auto";

    const productDetailBtn = $(".product-detail-btn");
    productDetailBtn.onclick = function () {
      cartIcons[index].click();
      isActive = !isActive;

      if (isActive) {
        this.className = "delete-from-cart-btn product-detail-btn";
        this.textContent = "Xóa khỏi giỏ hàng";
      } else {
        this.className = "add-to-cart-btn product-detail-btn";
        this.textContent = "Thêm vào giỏ hàng";
      }
    };

    const closeBtn = $(".product-detail .close-btn");
    closeBtn.onclick = function () {
      translateY(productDetail);
    };

    productDetail.onclick = function (e) {
      if (e.target.matches(".product-detail")) translateY(productDetail);
    };
  };
});

cartIcons.forEach(function (cartIcon, index) {
  cartIcon.onclick = function () {
    event.stopPropagation();
    this.classList.toggle("active");
    const container = this.parentNode.parentNode;
    const item = createItem(container, index);
    const total = $(".header__navbar-cart-total");
    const price = +container
      .querySelector(".gallery__food-price")
      .innerText.slice(0, -3)
      .replace(/,/g, ""); // + is convert to number
    let curTotal = +total.innerText.replace(/,/g, "");

    if (this.classList.contains("active")) {
      headerNavbarCartList.innerHTML += item;
      curTotal += price;
      addToCart(baseUrl + "add-to-order.php", container);
    } else {
      const elementRemoved = $(
        `.cart-item[pd-id="${container.getAttribute("pd-id")}"]`
      );
      const itemQuantity = +elementRemoved.querySelector(".quantity").innerText;
      curTotal -= price * itemQuantity;
      elementRemoved.remove();
      deleteFromOrder(baseUrl + "delete-from-order.php", container);
    }

    total.innerHTML = curTotal.toLocaleString();
    const cartItems = $$(".cart-item");
    cartItemQuantity.innerText = cartItems.length;
    headerNavbarCartListNoItemImg.style.display =
      cartItems.length > 0 ? "none" : "block";
    setOverflowYAuto();
  };
});

function addToCart(path, container) {
  const formData = new FormData();
  formData.append("pd_id", container.getAttribute("pd-id"));
  formData.append("us_id", $(".us-id").value);

  fetch(path, {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then(() => setOverflowYAuto());
}

function createItem(container, index) {
  const title = container.querySelector(".gallery__food-title").innerText;
  const pdId = container.getAttribute("pd-id");

  return `
    <section 
      class="col l-12 m-12 c-12 cart-item item" pd-id="${pdId}"
    >
      <i class="fa-solid fa-trash remove-icon" onclick="removeItem()"></i>
      <section class="container-quantity">
        <span class="minus"><i class="fa-solid fa-minus" onclick="decrease()"></i></span>
        <span class="quantity">1</span>
        <span class="plus"><i class="fa-solid fa-plus" onclick="increase()"></i></span>
      </section>

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
