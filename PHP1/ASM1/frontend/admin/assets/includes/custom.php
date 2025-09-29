<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/custom.css" />
    <link rel="stylesheet" href="../css/grid.css" />
    <!-- font awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>

  <body>
    <main class="grid wide main">
      <div class="row">
        <!-- slide bar -->
        <?php 
          include ('slide-bar.php');
        ?>

        <!-- custom -->
        <div class="col l-10 m-12 c-12 content">
          <table class="custom-table">
            <thead>
              <tr class="row header-table">
                <th class="col l-6 m-6 c-12">
                  <h1 class="title">Quản lý khách hàng</h1>
                </th>

                <th class="col l-6 m-6 c-12 header-actions">
                  <span class="delete-action header-action">
                    <i class="fa-solid fa-circle-minus"></i>
                    Xóa
                  </span>
                  <span class="add-action header-action">
                    <i class="fa-solid fa-circle-plus"></i>
                    Thêm
                  </span>
                </th>
              </tr>

              <tr class="row">
                <th class="col l-1 m-1 c-1 name-column">
                  <input type="checkbox" class="checkbox all-checkbox" />
                </th>
                <th class="col l-1 m-1 c-1 name-column">STT</th>
                <th class="col l-3 m-3 c-4 name-column">Tên</th>
                <th class="col l-3 m-3 c-4 name-column">Email</th>
                <th class="col l-3 m-3 c-0 name-column">Số điện thoại</th>
                <th class="col l-1 m-1 c-2 name-column">Hành động</th>
              </tr>
            </thead>

            <tbody>
              <?php
                $dbc = mysqli_connect('localhost', 'root', 'password', 'pc05353')
                  or die('Error connecting to mysql.');
                $query = "SELECT * FROM customer";
                $result = mysqli_query($dbc, $query) or die('Error querying database.');
                $show_id = 1;
                
                while ($row = mysqli_fetch_array($result)) {
                  $id = $row['cs_id']; // realistic of customer
                  $name = $row['cs_name'];
                  $email = $row['cs_email'];
                  $phone = $row['cs_phone'];

                  echo "
                    <tr class=\"row\">
                      <td class=\"col l-1 m-1 c-1 name-column\">
                        <input type=\"text\" hidden name=\"id\" value=\"$id\" />
                        <input type=\"checkbox\" class=\"checkbox\" />
                      </td>
                      <td class=\"col l-1 m-1 c-1 name-column\">$show_id</td>
                      <td class=\"col l-3 m-3 c-4 name-column\">$name</td>
                      <td class=\"col l-3 m-3 c-4 name-column\">$email</td>
                      <td class=\"col l-3 m-3 c-0 name-column\">$phone</td>
                      <td class=\"col l-1 m-1 c-2 name-column\">
                        <span class=\"edit-icon-container\">
                          <i class=\"fa-solid fa-pencil edit-icon action-icon\"></i>
                          <div class=\"edit-icon-text\">Edit</div>
                        </span>

                        <span class=\"delete-icon-container\">
                          <i class=\"fa-solid fa-trash delete-icon action-icon\"></i>
                          <div class=\"delete-icon-text\">Delete</div>
                        </span>
                      </td>
                    </tr>";
                  $show_id++;
                }

                mysqli_Close($dbc);
              ?>
              <tr class="row more">
                <td class="col l-0 m-0 c-12 show-col">Xem thêm</td>
                <td class="col l-0 m-0 c-12 hide hide-col">Ẩn bớt</td>
              </tr>
              <tr class="row footer-table">
                <td class="col l-6 m-6 c-12 hint-text">
                  Hiển thị
                  <span class="page-quantity current-quantity">5</span>/
                  <span class="page-quantity">25</span>
                </td>
                <td class="col l-6 m-6 c-12 pagination">
                  <li class="page-item prev-btn">Quay lại</li>
                  <li class="page-item">1</li>
                  <li class="page-item">2</li>
                  <li class="page-item active">3</li>
                  <li class="page-item">4</li>
                  <li class="page-item">5</li>
                  <li class="page-item next-btn">Tiếp</li>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>

    <!-- <script src="../js/custom.js"></script> -->
    <script>
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

  modalForm.onsubmit = function(event) {
    event.preventDefault();
    const formData = new FormData(this);
    fetch (' http://localhost/ASM_PHP_2/backend/add.php', {
      method: this.method,
      body: formData
    })
      .then(response => response.text())
      .then(data => {
        console.log(data);
      })
      .catch(error => {
        console.log(error);
      })
  }
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

    </script>
  </body>
</html>
