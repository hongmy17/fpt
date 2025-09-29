const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
$('.category-link[href*="products.php"]').classList.add("active");

const allCheckBtn = $(".all-checkbox");
const headerDeleteAction = $(".delete-action");
const headerAddAction = $(".add-action");
const customTable = $(".custom-table");
const showCol = $(".custom-table .show-col");
const hideCol = $(".custom-table .hide-col");
const contentEle = $(".content");
const showingCols = [1, 2, 2, 5, 0, 0, 0, 2]; // các element lần lượt chiếm 1 cột, 1 cột, ...
const hidingCols = [1, 1, 1, 2, 2, 3, 1, 1]; // tương tự
const columnQuantity = showingCols.length;

const modal = $(".modal");
const modalForm = $(".modal form");
const modalFormFooter = $(".form-footer");
const formTitle = $(".form-header .title");
const closeBtn = $(".close-btn");
const cancelBtn = $(".cancel-btn");
const submitBtn = $(".submit-btn");
const baseUrl = $(".base-url").value;

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

  if (e.target.matches(".ellipse")) {
    getFullContent(e.target);
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
  formTitle.textContent = "Thêm sản phẩm";
  submitBtn.className = "add-btn";
  submitBtn.textContent = "Thêm";
  insertHTML(formAddUpdate);
  validate("add");

  const imageInput = modalForm.elements["file"];
  const image = modalForm.querySelector(".image");
  imageInput.oninput = function () {
    const imageInputFile = this.files[0];
    const reader = new FileReader();
    reader.onload = function () {
      image.src = reader.result;
    };
    reader.readAsDataURL(imageInputFile);
  };
};

modal.onclick = slideUp;
closeBtn.onclick = slideUp;
cancelBtn.onclick = slideUp;

headerDeleteAction.onclick = (e) => {
  if (e.target.matches(".active")) {
    const checkBtns = $$(".checkbox:not(.all-checkbox)");
    slideDown();
    formTitle.textContent = "Xóa sản phẩm";
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
  formTitle.textContent = "Cập nhật sản phẩm";
  submitBtn.className = "save-btn";
  submitBtn.textContent = "Lưu";
  insertHTML(formAddUpdate);
  validate("update", index);
  index = checkBtns[index].previousElementSibling.value;
  modalForm.firstElementChild.setAttribute("value", [index]);

  const formData = new FormData(modalForm);
  fetch(`${modalForm.elements["base-url"].value}/products/getInfoProduct.php`, {
    method: "POST",
    body: formData, // data is send
  })
    .then((response) => response.json())
    .then((infoProduct) => {
      const formElements = modalForm.elements;
      const name = formElements["name"];
      const price = formElements["price"];
      const desc = formElements["desc"];
      const categories = formElements["categories"];
      const image = modalForm.querySelector(".image");
      const nameImg = infoProduct.img.slice(
        infoProduct.img.lastIndexOf("/") + 1
      );
      image.src =
        formElements["base-url"].value + "products/" + infoProduct.img;
      const imageInput = formElements["file"];

      imageInput.oninput = function () {
        const imageInputFile = this.files[0];
        const reader = new FileReader();
        reader.onload = function () {
          image.src = reader.result;
        };
        reader.readAsDataURL(imageInputFile);
      };

      const imgFile = new File([""], nameImg, {
        type: "image" + nameImg.slice(nameImg.lastIndexOf(".") + 1),
        lastModified: new Date(),
      });
      const productImage = new DataTransfer();
      productImage.items.add(imgFile);

      imageInput.files = productImage.files;
      name.value = infoProduct.name;
      price.value = infoProduct.price;
      desc.value = infoProduct.desc;
      categories.value = infoProduct.category_id;
    });
}

function handleDelete(index) {
  const checkBtns = $$(".checkbox:not(.all-checkbox)");
  slideDown();
  formTitle.textContent = "Xóa sản phẩm";
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

function getFullContent(element) {
  if ($(".ellipse-content")) {
    $(".ellipse-content").remove();
  } else {
    const newElement = `<div class="ellipse-content">${element.innerHTML}</div>`;
    element.insertAdjacentHTML("afterbegin", newElement);
  }
}

function validate(action, index = "") {
  if (action !== "delete") {
    const formElements = modalForm.elements;
    var img = formElements["file"];
    var name = formElements["name"];
    var price = formElements["price"];
    var desc = formElements["desc"];
    var category = formElements["categories"];

    img.onblur = function () {
      isEmpty(this) && isImg(this);
    };
    img.onfocus = function () {
      setText(this.nextElementSibling);
    };
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
    price.onblur = function () {
      isEmpty(this);
    };
    price.onfocus = function () {
      setText(this.nextElementSibling);
    };
    desc.onblur = function () {
      isEmpty(this);
    };
    desc.onfocus = function () {
      setText(this.nextElementSibling);
    };
    category.onblur = function () {
      isEmpty(this);
    };
    category.onfocus = function () {
      setText(this.nextElementSibling);
    };
  }

  modalForm.onsubmit = function () {
    event.preventDefault();
    if (action !== "delete") {
      const isValidImg = isEmpty(img) && isImg(img);
      const isValidName = isEmpty(name);
      const isValidPrice = isEmpty(price);
      const isValidDesc = isEmpty(desc);
      const isValidCate = isEmpty(category);
      const imgName = img.value.substr(img.value.lastIndexOf("\\") + 1); // C:\fakepath\img_name.jpg

      if (
        isValidImg &&
        isValidName &&
        isValidPrice &&
        isValidDesc &&
        isValidCate
      ) {
        handleAction(action);
      }
    } else {
      handleAction(action);
    }
  };
}

function handleAction(action) {
  const baseUrlEle = modalForm.elements["base-url"];
  modalForm.setAttribute("action", baseUrlEle.value + `products/${action}.php`);
  modalForm.submit();
}

function isEmpty(element) {
  if (!element.value) {
    return setText(element.nextElementSibling, "Vui lòng nhập trường này");
  }

  return setText(element.nextElementSibling);
}

function isImg(element) {
  const regexImg = /\.(jpg|png|jpeg|gif|pdf)$/i;
  if (!regexImg.test(element.value)) {
    return setText(element.nextElementSibling, "Vui lòng chọn hình ảnh");
  }

  return setText(element.nextElementSibling);
}

function setText(element, message = "") {
  element.textContent = message;
  return !message ? true : false; // when message = '', validate is valid
}
