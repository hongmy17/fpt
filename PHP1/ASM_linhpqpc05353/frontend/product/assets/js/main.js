const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const header = $(".header");
const baseUrl = $(".base-url").value;

const total = $(".header__navbar-cart-total");
const cartItemQuantity = $(".cart-item-quantity");
const headerNavbarCartList = $(".header__navbar-cart-list .container-item");

const headerNavbar = $(".header__navbar");
const headerNavbarIcon = $(".header-mobile-tablet__navbar-icon");
const headerNavbarOverlay = $(".header-mobile-tablet__navbar-overlay");
const headerNavbarCloseIcon = $(".header-mobile-tablet__close-icon");
const headerNavbarCartBuyBtn = $(".header__navbar-cart-buy-btn");
const seeBillBtn = $(".see-bill-btn");
const billItems = $$(".bill-item");
const bill = $(".overlay.bill");

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

function increase() {
  let itemQuantity = event.target.parentNode.previousElementSibling;
  let curItemQuantity = Number(itemQuantity.innerText);
  const container = event.target.parentNode.parentNode.parentNode;

  itemQuantity.innerText = ++curItemQuantity;
  total.innerText = (
    Number(total.innerText.replace(/,/g, "")) +
    Number(
      container
        .querySelector(".item-price")
        .innerText.slice(0, -3)
        .replace(/,/g, "")
    )
  ).toLocaleString();

  const pdId = container.getAttribute("pd-id");
  editQuantity(baseUrl + "edit-quantity.php", curItemQuantity, pdId);
}

function decrease() {
  const itemQuantity = event.target.parentNode.nextElementSibling;
  let curItemQuantity = Number(itemQuantity.innerText);
  if (curItemQuantity <= 0) return;
  const container = event.target.parentNode.parentNode.parentNode;

  itemQuantity.innerText = --curItemQuantity;
  total.innerText = (
    Number(total.innerText.replace(/,/g, "")) -
    Number(
      container
        .querySelector(".item-price")
        .innerText.slice(0, -3)
        .replace(/,/g, "")
    )
  ).toLocaleString();

  const pdId = container.getAttribute("pd-id");
  editQuantity(baseUrl + "edit-quantity.php", curItemQuantity, pdId);
}

function editQuantity(path, quantity, pdId) {
  const formData = new FormData();
  formData.append("quantity", quantity);
  const href = this.location.href;
  formData.append("us_id", href.slice(href.lastIndexOf("=") + 1));
  formData.append("pd_id", pdId);
  formData.append("total", Number(total.innerText.replace(/,/g, "")));

  fetch(path, {
    method: "POST",
    body: formData,
  }).then((response) => response.text());
}

function removeItem() {
  const container = event.target.parentNode;

  let index = 0;
  const pdId = container.getAttribute("pd-id");
  $(`.cart-icon[pd-id='${pdId}']`)?.classList.toggle("active");

  let curTotal = Number(total.innerText.replace(/,/g, ""));
  const price = container.querySelector(".item-price").innerText;
  let itemQuantity = container.querySelector(".quantity").innerText;
  curTotal -=
    Number(price.slice(0, -3).replace(/,/g, "")) * Number(itemQuantity);

  total.innerText = curTotal.toLocaleString();
  container.remove();
  const cartItems = $$(".cart-item");
  cartItemQuantity.innerText = cartItems.length;
  headerNavbarCartListNoItemImg.style.display =
    cartItems.length > 0 ? "none" : "block";
  deleteFromOrder(baseUrl + "delete-from-order.php", container);
}

function deleteFromOrder(path, container) {
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

function setOverflowYAuto() {
  headerNavbarCartList.style.overflowY = "";
  headerNavbarCartList.style.bottom = "";
  const maxHeightElement = window.innerHeight - 100 - 16;
  const currentElementHeight = headerNavbarCartList.offsetHeight;

  if (currentElementHeight > maxHeightElement) {
    headerNavbarCartList.style.overflowY = "auto";
    headerNavbarCartList.style.bottom = "50px";
  }
}

window.onresize = function () {
  window.innerWidth >= 1024 ? slideIn() : slideOut();
  setOverflowYAuto();
};

headerNavbarCartBuyBtn.onclick = function () {
  if ($$(".cart-item").length === 0) {
    const announceNoItem = $(".announce-no-item");

    translateRight(announceNoItem, 0);
    transLateTimeOut = setTimeout(() => {
      translateRight(announceNoItem, 150);
    }, 2000);
  } else {
    if (total.innerText == 0) {
      const announceNoQuantity = $(".announce-no-quantity");

      translateRight(announceNoQuantity, 0);
      transLateTimeOut = setTimeout(() => {
        translateRight(announceNoQuantity, 150);
      }, 2000);
    } else {
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
          const formData = new FormData();
          formData.append("us_id", $(".us-id").value);
          formData.append("shipping_address", announceAddressInput.value);
          fetch(baseUrl + "set-shipping-address.php", {
            method: "POST",
            body: formData,
          }).then((response) => response.text());

          announceAddressInput.style.borderLeft = "";
          translateY(announceAddress);

          const announceSuccessBuy = $(".announce-success-buy");
          translateY(announceSuccessBuy, 0);

          announceSuccessBuy.onclick = (e) => {
            if (e.target.matches(".announce-success-buy"))
              translateY(announceSuccessBuy);
          };

          const seeBillBtn = $(".see-bill-btn");
          seeBillBtn.onclick = function () {
            translateY(announceSuccessBuy);
            translateY(bill, 0);

            fetch(baseUrl + "create-bill.php", {
              method: "POST",
              body: formData,
            })
              .then((response) => response.json())
              .then((billBody) => {
                bill.innerHTML = billBody;
              })
              .then(() => {
                const closeBtn = $(".bill .close-btn");
                closeBtn.onclick = function () {
                  translateY(bill);
                };
              });
          };
        }
      };
    }
  }
};

function translateRight(element, val) {
  element.style.transform = `translateX(${val}%)`;
}

function translateY(element, val = "") {
  element.style.top = val;
}

billItems.forEach((billItem) => {
  billItem.onclick = function () {
    const formData = new FormData();
    const billId = this.getAttribute("bill-id");
    formData.append("bill_id", billId);

    fetch(baseUrl + "get-bill.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((billBody) => {
        bill.innerHTML = billBody;
      })
      .then(() => {
        const closeBtn = $(".bill .close-btn");
        closeBtn.onclick = function () {
          translateY(bill);
        };
      });
    translateY(bill, 0);
  };
});

bill.onclick = (e) => {
  if (e.target.matches(".bill")) translateY(bill);
};
