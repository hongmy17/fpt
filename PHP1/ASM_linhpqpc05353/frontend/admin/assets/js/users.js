const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
$('.category-link[href*="users.php"]').classList.add("active");

const allCheckBtn = $(".all-checkbox");
const headerDeleteAction = $(".delete-action");
const headerAddAction = $(".add-action");
const customTable = $(".custom-table");
const showCol = $(".custom-table .show-col");
const hideCol = $(".custom-table .hide-col");
const contentEle = $(".content");
const showingCols = [1, 1, 4, 4, 0, 0, 2]; // các element lần lượt chiếm 1 cột, 1 cột, ...
const hidingCols = [1, 1, 3, 3, 2, 1, 1]; // tương tự
const columnQuantity = showingCols.length;

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
      <input type="text" class="form-input" name="email" placeholder="Email" />
      <p class="message"></p>
    </div>
    <div class="form-group">
      <input
        type="number"
        class="form-input"
        name="phone"
        placeholder="Số điện thoại"
      />
      <p class="message"></p>
    </div>
    <div class="form-group" style="display: flex; align-items: center">
      <input
        type="checkbox"
        class="form-input"
        name="is-admin"
        id="checkbox"
        style="width: 18px; height: 20px; margin-right: 10px"
      />
      <label for="checkbox">Phân quyền Admin?</label>
    </div>
  </div>`;

const warning = `
  <div class="form-body">
    <h3>Bạn chắc chắn muốn xóa những hàng này?</h3>
    <p class="text-warning">Hành động này không thể khôi phục.</p>
  </div>`;

let checkNum = 0;

customTable.onclick = function (e) {
  if (e.target.matches(".checkbox:not(.all-checkbox)")) {
    const checkBtns = $$(".checkbox:not(.all-checkbox)");
    activeHeaderDeleteAction(checkBtns, e.target);
    allCheckBtn.checked = checkNum === checkBtns.length ? true : false;
  }

  if (e.target.matches(".edit-icon")) {
    const editIcons = $$(".edit-icon");
    editIcons.forEach((editIcon, index) => {
      e.target == editIcon && handleEdit(index);
    });
  }

  if (e.target.matches(".delete-icon")) {
    const deleteIcons = $$(".delete-icon");
    deleteIcons.forEach((deleteIcon, index) => {
      e.target == deleteIcon && handleDelete(index);
    });
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
  validate("add");
};

modal.onclick = slideUp;
closeBtn.onclick = slideUp;
cancelBtn.onclick = slideUp;

headerDeleteAction.onclick = (e) => {
  if (e.target.matches(".active")) {
    const checkBtns = $$(".checkbox:not(.all-checkbox)");
    slideDown();
    formTitle.textContent = "Xóa khách hàng";
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
  const checkBtns = $$(".checkbox:not(.all-checkbox)");
  slideDown();
  formTitle.textContent = "Cập nhật khách hàng";
  submitBtn.className = "save-btn";
  submitBtn.textContent = "Lưu";
  insertHTML(formAddUpdate);
  validate("update", index);
  index = checkBtns[index].previousElementSibling.value;
  modalForm.firstElementChild.setAttribute("value", [index]);

  const formData = new FormData(modalForm);
  fetch(`${modalForm.elements["base-url"].value}/users/getInfoUser.php`, {
    method: "POST",
    body: formData, // data is send
  })
    .then((response) => response.json())
    .then((infoUser) => {
      const formElements = modalForm.elements;
      const name = formElements["name"];
      const email = formElements["email"];
      const phone = formElements["phone"];
      const isAdmin = formElements["checkbox"];

      name.value = infoUser.name;
      email.value = infoUser.email;
      phone.value = "0" + infoUser.phone;
      isAdmin.checked = +infoUser.isAdmin;
    });
}

function handleDelete(index) {
  const checkBtns = $$(".checkbox:not(.all-checkbox)");
  slideDown();
  formTitle.textContent = "Xóa khách hàng";
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
    var email = formElements["email"];
    var phone = formElements["phone"];

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
    email.onblur = function () {
      isEmpty(this) && isEmail(this);
    };
    email.onfocus = function () {
      setText(this.nextElementSibling);
    };
    phone.onblur = function () {
      isEmpty(this) && isPhoneNum(this);
    };
    phone.onfocus = function () {
      isValidPhone = setText(this.nextElementSibling);
    };
  }

  modalForm.onsubmit = function () {
    event.preventDefault();
    if (action !== "delete") {
      let isValidName = true;
      let isValidEmail = true;
      let isValidPhone = true;

      isValidName = isEmpty(name);
      isValidEmail = isEmpty(email) && isEmail(email);
      isValidPhone = isEmpty(phone) && isPhoneNum(phone);

      if (isValidName && isValidEmail && isValidPhone) {
        handleAction(action);
      }
    } else {
      handleAction(action);
    }
  };
}

function handleAction(action) {
  const baseUrlEle = modalForm.elements["base-url"];
  modalForm.setAttribute("action", baseUrlEle.value + `users/${action}.php`);
  modalForm.submit();
}

function isEmpty(element) {
  if (!element.value) {
    return setText(element.nextElementSibling, "Vui lòng nhập trường này");
  }

  return setText(element.nextElementSibling);
}

function isEmail(element) {
  const regex =
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (!regex.test(element.value)) {
    return setText(element.nextElementSibling, "Trường này phải là email");
  }

  return setText(element.nextElementSibling);
}

function isPhoneNum(element) {
  const regex = /^(?:\+?(?:84|0))(?:\d){9,10}$/;
  if (!regex.test(element.value)) {
    return setText(
      element.nextElementSibling,
      "Trường này phải là số điện thoại"
    );
  }

  return setText(element.nextElementSibling);
}

function setText(element, message = "") {
  element.textContent = message;
  return !message ? true : false; // when message = '', validate is valid
}
