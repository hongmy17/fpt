var items = document.getElementById("item-list");
var cart = document.getElementById("my-cart");
var addBtns = document.querySelectorAll("#item-list .btn");
var cost = document.getElementById("cost");
var total = 0;

function createItem(node) {
  var namePhone = node.querySelector(".name").innerText;
  var amount = node.querySelector(".amount").innerText;

  var item = document.createElement("tr");
  item.innerHTML = `
    <td class="name">${namePhone}</td>
    <td class="amount">${amount}</td>
    <td class="btn">Xóa</td>`;

  cart.appendChild(item);
  total += Number(amount.substring(1));
  cost.innerText = total;

  var removeBtns = document.querySelectorAll("#my-cart .btn");
  removeBtns.forEach(function (btn) {
    btn.onclick = function () {
      removeItem(btn.parentNode);
    };
  });
}

function removeItem(node) {
  var amount = node.parentNode.querySelector(".amount").innerText;
  node.parentNode.removeChild(node);
  total -= Number(amount.substring(1));
  cost.innerText = total;
}

addBtns.forEach(function (btn) {
  btn.onclick = function () {
    createItem(btn.parentNode);
  };
});
