const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const allCheckBtn = $(".all-checkbox");
const headerDeleteAction = $(".delete-action");
const headerAddAction = $(".add-action");
const customTable = $(".custom-table");
const showCol = $(".custom-table .show-col");
const hideCol = $(".custom-table .hide-col");
const contentEle = $(".content");
const showingCols = [1, 1, 4, 4, 0, 0, 2]; // các element lần lượt chiếm 1 cột, 1 cột, ...
const hidingCols = [1, 1, 1, 4, 2, 2, 1]; // tương tự
const columnQuantity = showingCols.length;
const checkBtns = $$(".checkbox:not(.all-checkbox)");
const editIcons = $$(".edit-icon");
const deleteIcons = $$(".delete-icon");
const columns = $$(".custom-table .name-column");
const rows = $$(".custom-table .row");
const ellipses = $$(".ellipse");

const modal = $(".modal");
const modalForm = $(".modal form");
const modalFormFooter = $(".form-footer");
const formTitle = $(".form-header .title");
const closeBtn = $(".close-btn");
const cancelBtn = $(".cancel-btn");
const submitBtn = $(".submit-btn");

const formAddUpdate = `
        <div class="form-body">
          <div class="form-group">
            <input type="text" class="form-input" name="name" placeholder="Tên" />
            <p class="message"></p>
          </div>
          <div class="form-group">
            <input
              type="text"
              class="form-input"
              name="note"
              placeholder="Chú thích"
            />
            <p class="message"></p>
          </div>
        </div>`;

const warning = `
        <div class="form-body">
          <h3>Bạn chắc chắn muốn xóa những hàng này?</h3>
          <p class="text-warning">Hành động này không thể khôi phục.</p>
        </div>`;

let checkNum = 0;

checkBtns.forEach(function (checkBtn) {
  checkBtn.onclick = function (e) {
    activeHeaderDeleteAction(checkBtns, e.target);
    allCheckBtn.checked = checkNum === checkBtns.length ? true : false;
  };
});

editIcons.forEach(function (editIcon, index) {
  editIcon.onclick = function () {
    this == editIcon && handleEdit(index);
  };
});

deleteIcons.forEach(function (deleteIcon, index) {
  deleteIcon.onclick = function () {
    this == deleteIcon && handleDelete(index);
  };
});

ellipses.forEach(function (ellipse) {
  ellipse.onclick = function () {
    getFullContent(this);
  };
});
allCheckBtn.onclick = setActiveHeaderDeleteAction;

function setActiveHeaderDeleteAction() {
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
  formTitle.textContent = "Thêm thể loại";
  submitBtn.className = "add-btn";
  submitBtn.textContent = "Thêm";
  insertHTML(formAddUpdate);
  validate("add");
};

modal.onclick = slideUp;
closeBtn.onclick = slideUp;
cancelBtn.onclick = slideUp;

headerDeleteAction.onclick = (e) => {
  if (e.target.matches(".active")) {
    slideDown();
    formTitle.textContent = "Xóa thể loại";
    submitBtn.className = "delete-btn";
    submitBtn.textContent = "Xóa";
    insertHTML(warning);

    const ids = [];
    const arrId = [];
    checkBtns.forEach((checkBtn, index) => {
      if (checkBtn.checked) {
        ids.push(checkBtn.previousElementSibling.value);
        arrId.push(index);
      }
    });
    modalForm.firstElementChild.setAttribute("value", ids);
    validate("delete", arrId);
  }
};

function handleEdit(index) {
  slideDown();
  formTitle.textContent = "Cập nhật thể loại";
  submitBtn.className = "save-btn";
  submitBtn.textContent = "Lưu";
  insertHTML(formAddUpdate);
  validate("update", index);
  index = checkBtns[index].previousElementSibling.value;
  modalForm.firstElementChild.setAttribute("value", [index]);

  const formData = new FormData(modalForm);
  fetch(`features/getInfoCategory.php`, {
    method: "POST",
    body: formData, // data is send
  })
    .then((response) => response.json())
    .then((infoCategory) => {
      const formElements = modalForm.elements;
      const name = formElements["name"];
      const note = formElements["note"];

      name.value = infoCategory.name;
      note.value = infoCategory.note;
    });
}

function handleDelete(index) {
  slideDown();
  formTitle.textContent = "Xóa thể loại";
  submitBtn.classList = "delete-btn";
  submitBtn.textContent = "Xóa";
  insertHTML(warning);

  validate("delete", [index]);
  index = checkBtns[index].previousElementSibling.value;
  // <td class="col l-1 m-1 c-1 name-column">
  //   <input type="text" hidden name="id" value="$id" />
  //   <input type="checkbox" class="checkbox" /> checkBtns[index]
  // </td>

  modalForm.firstElementChild.setAttribute("value", [index]);
  // <form method="post">
  //   <input type="text" hidden name="id" /> first element child
  //   ...
  // </form>
}

function insertHTML(html) {
  modalForm.removeChild($(".form-body"));
  modalFormFooter.insertAdjacentHTML("beforebegin", html);
}

function validate(action, index = "") {
  if (action !== "delete") {
    var formElements = modalForm.elements;
    var name = formElements["name"];
    var note = formElements["note"];

    name.onblur = function () {
      isEmpty(this);
    };
    name.onfocus = function () {
      setText(this.nextElementSibling);
      // <div class="form-group">
      //   <input type="text" class="form-input" name="name" placeholder="Tên" /> "this"
      //   <p class="message"></p>
      // </div>
    };
    note.onblur = function () {
      isEmpty(this);
    };
    note.onfocus = function () {
      setText(this.nextElementSibling);
    };
  }

  modalForm.onsubmit = function () {
    event.preventDefault();
    if (action !== "delete") {
      let isValidName = true;
      let isValidNote = true;

      isValidName = isEmpty(name);
      isValidNote = isEmpty(note);

      if (isValidName && isValidNote) {
        handleAction(action);
      }
    } else {
      handleAction(action);
    }
  };
}

function handleAction(action) {
  modalForm.setAttribute("action", `./features/${action}.php`);
  modalForm.submit();
}

function isEmpty(element) {
  if (!element.value) {
    return setText(element.nextElementSibling, "Vui lòng nhập trường này");
  }

  return setText(element.nextElementSibling);
}

function setText(element, message = "") {
  element.textContent = message;
  return !message ? true : false; // when message = '', validate is valid
}

function getFullContent(element) {
  if ($(".ellipse-content")) {
    $(".ellipse-content").remove();
  } else {
    const newElement = `<div class="ellipse-content">${element.innerHTML}</div>`;
    element.insertAdjacentHTML("afterbegin", newElement);
  }
}
