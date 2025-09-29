const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
$('.category-link[href*="orders.php"]').classList.add("active");

const customTable = $(".custom-table");
const showCol = $(".custom-table .show-col");
const hideCol = $(".custom-table .hide-col");
const contentEle = $(".content");
const showingCols = [1, 2, 5, 0, 0, 2]; // các element lần lượt chiếm 1 cột, 1 cột, ...
const hidingCols = [1, 1, 2, 2, 3, 1]; // tương tự
const columnQuantity = showingCols.length;
const columns = $$(".custom-table .name-column");
const rows = $$(".custom-table .row");
const ellipses = $$(".ellipse");

const baseUrl = $(".base-url").value;
const infoIcons = $$(".info-icon");
const tableDetailBody = $(".table-detail tbody");
const contentWrapper = $(".content .wrapper");
const backBtn = $(".content .back-btn");

ellipses.forEach((ellipse) => {
  ellipse.onclick = function () {
    getFullContent(this);
  };
});

infoIcons.forEach((infoIcon) => {
  infoIcon.onclick = function () {
    const formData = new FormData();
    formData.append("order_id", infoIcon.getAttribute("order-id"));
    fetch(baseUrl + "get-order-detail.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((orders) => {
        tableDetailBody.innerHTML = orders;
        contentWrapper.style.transform = `translateX(-${contentWrapper.parentNode.clientWidth}px)`;
        // console.log(orders);
      });
  };
});

backBtn.onclick = function () {
  contentWrapper.style.transform = ``;
};

showCol.onclick = function () {
  const columns = $$(".custom-table .name-column");
  const rows = $$(".custom-table .row");
  this.classList.add("hide");
  hideCol.classList.remove("hide");

  columns.forEach((column, index) => {
    const hideCol = hidingCols[index % columnQuantity]; // số lượng column vượt quá index của hidingCols nên phải chia lấy dư để lấy index từ 0 -> 5
    const showCol = showingCols[index % columnQuantity];
    column.classList.remove(`c-${showCol}`);
    column.classList.add(`c-${hideCol}`);
  });

  rows.forEach((row) => {
    row.style.width = "1000px";
  });
  contentEle.style.overflowX = "auto";
};

hideCol.onclick = function () {
  const columns = $$(".custom-table .name-column");
  const rows = $$(".custom-table .row");
  this.classList.add("hide");
  showCol.classList.remove("hide");

  columns.forEach((column, index) => {
    const hideCol = hidingCols[index % columnQuantity];
    const showCol = showingCols[index % columnQuantity];
    column.classList.remove(`c-${hideCol}`);
    column.classList.add(`c-${showCol}`);
  });

  rows.forEach((row) => {
    row.style.width = "";
  });
  contentEle.style.overflowX = "";
};

function getFullContent(element) {
  if ($(".ellipse-content")) {
    $(".ellipse-content").remove();
  } else {
    const newElement = `<div class="ellipse-content">${element.innerHTML}</div>`;
    element.insertAdjacentHTML("afterbegin", newElement);
  }
}
