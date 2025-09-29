const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const allCheckBtn = $(".all-checkbox");
const customTable = $(".custom-table");
const showCol = $(".custom-table .show-col");
const hideCol = $(".custom-table .hide-col");
const contentEle = $(".content");
const showingCols = [1, 1, 4, 4, 0, 0, 2]; // các element lần lượt chiếm 1 cột, 1 cột, ...
const hidingCols = [1, 1, 3, 3, 2, 1, 1]; // tương tự
const columnQuantity = showingCols.length;

let checkNum = 0;

customTable.onclick = function (e) {
  if (e.target.matches(".checkbox:not(.all-checkbox)")) {
    const checkBtns = $$(".checkbox:not(.all-checkbox)");
    activeHeaderDeleteAction(checkBtns, e.target);
    allCheckBtn.checked = checkNum === checkBtns.length ? true : false;
  }
};

allCheckBtn.onclick = setActiveHeaderDeleteAction;

function setActiveHeaderDeleteAction() {
  const checkBtns = $$(".checkbox:not(.all-checkbox)");

  checkBtns.forEach((checkBtn) => {
    checkBtn.checked = allCheckBtn.checked;
    activeHeaderDeleteAction(checkBtns, checkBtn);
  });

  allCheckBtn.checked = checkNum === checkBtns.length ? true : false;
  if (!checkBtns.length) {
    headerDeleteAction.classList.remove("active");
    checkNum = 0;
    allCheckBtn.checked = false;
  }
}

function activeHeaderDeleteAction(checkBtns, checkBtn) {
  if (checkBtn.checked) {
    if (checkNum < checkBtns.length) checkNum++;
  } else {
    checkNum--;
  }

  if (checkNum > 0) {
    headerDeleteAction.classList.add("active");
    return;
  }

  headerDeleteAction.classList.remove("active");
  checkNum = 0;
}

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
