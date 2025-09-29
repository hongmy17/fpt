const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const windowParent = window.parent.document.body;
const allCheckBtn = $(".all-checkbox");
const checkBtns = $$(".checkbox:not(.all-checkbox)");
const headerDeleteAction = $(".delete-action");
const headerAddAction = $(".add-action");
const customTable = $(".custom-table");
const showCol = $(".custom-table .show-col");
const hideCol = $(".custom-table .hide-col");
const columns = $$(".custom-table .name-column");
const rows = $$(".custom-table .row");
const contentEle = $(".content");
const showingCols = [1, 1, 4, 4, 0, 2]; // các element lần lượt chiếm 1 cột, 4 cột, ...
const hidingCols = [1, 1, 3, 3, 3, 1]; // tương tự
const columnQuantity = 6;

const modal = windowParent.querySelector(".modal");
const modalForm = windowParent.querySelector(".modal form");
const modalFormFooter = windowParent.querySelector(".form-footer");
const editIcons = $$(".edit-icon");
const deleteIcons = $$(".delete-icon");
const formTitle = windowParent.querySelector(".form-header .title");
const closeBtn = windowParent.querySelector(".close-btn");
const cancelBtn = windowParent.querySelector(".cancel-btn");
const submitBtn = windowParent.querySelector(".submit-btn");

const formAddUpdate = `
  <div class="form-body">
    <input type="text" class="form-input" name="name" placeholder="Tên" />
    <input type="text" class="form-input" name="email" placeholder="Email" />
    <input type="number" class="form-input" name="phone" placeholder="Số điện thoại" />
  </div>`;

const warning = `
  <div class="form-body">
    <h3>Bạn chắc chắn muốn xóa những hàng này?</h3>
    <p class="text-warning">Hành động này không thể khôi phục.</p>
  </div>`;

let checkNum = 0;

$('.category-link[href="custom.php"]').classList.add("active");

allCheckBtn.onclick = function () {
  checkBtns.forEach((checkBtn) => {
    checkBtn.checked = allCheckBtn.checked;
    activeHeaderDeleteAction(checkBtn);
  });
};

checkBtns.forEach((checkBtn) => {
  checkBtn.onclick = function () {
    activeHeaderDeleteAction(checkBtn);
    allCheckBtn.checked = checkNum === checkBtn.length ? true : false;
  };
});

function activeHeaderDeleteAction(checkBtn) {
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

function slideDown() {
  modal.style.opacity = "1";
  modal.style.transform = "translateY(0)";
}

function slideUp(e) {
  if (
    e.target.matches(".overlay") ||
    e.target.matches(".close-btn") ||
    e.target.matches(".cancel-btn")
  ) {
    modal.style.opacity = "";
    modal.style.transform = "";
  }
}

headerAddAction.onclick = function () {
  slideDown();
  formTitle.textContent = "Thêm khách hàng";
  submitBtn.className = "add-btn";
  submitBtn.textContent = "Thêm";
  insertHTML(formAddUpdate);
  modalForm.setAttribute("action", "../../backend/add.php");

  $(document).ready(function () {
    modalForm.submit(function (event) {
      event.preventDefault();

      $.ajax({
        url: $(this).attr("action"),
        type: $(this).attr("method"),
        data: $(this).serialize(),
        success: function (response) {
          console.log(response);
        },
        error: function (xhr, status, error) {
          console.error(error);
        },
      });
    });
  });
};

modal.onclick = slideUp;
closeBtn.onclick = slideUp;
cancelBtn.onclick = slideUp;

editIcons.forEach((editIcon, index) => {
  editIcon.onclick = () => {
    slideDown();
    formTitle.textContent = "Cập nhật khách hàng";
    submitBtn.className = "save-btn";
    submitBtn.textContent = "Lưu";
    insertHTML(formAddUpdate);
    modalForm.setAttribute("action", "../../backend/update.php");
    index = checkBtns[index].previousElementSibling.value;
    modalForm.firstElementChild.setAttribute("value", [index]);
  };
});

deleteIcons.forEach((deleteIcon, index) => {
  deleteIcon.onclick = () => {
    slideDown();
    formTitle.textContent = "Xóa khách hàng";
    submitBtn.classList = "delete-btn";
    submitBtn.textContent = "Xóa";
    insertHTML(warning);
    modalForm.setAttribute("action", "../../backend/delete.php");
    index = checkBtns[index].previousElementSibling.value;
    modalForm.firstElementChild.setAttribute("value", [index]);
  };
});

headerDeleteAction.onclick = (e) => {
  if (e.target.matches(".active")) {
    slideDown();
    formTitle.textContent = "Xóa khách hàng";
    submitBtn.className = "delete-btn";
    submitBtn.textContent = "Xóa";
    insertHTML(warning);
    modalForm.setAttribute("action", "../../backend/delete.php");
    const ids = [];
    checkBtns.forEach((checkBtn) => {
      if (checkBtn.checked) ids.push(checkBtn.previousElementSibling.value);
    });
    modalForm.firstElementChild.setAttribute("value", ids);
  }
};

function insertHTML(html) {
  modalForm.removeChild(windowParent.querySelector(".form-body"));
  modalFormFooter.insertAdjacentHTML("beforebegin", html);
}
