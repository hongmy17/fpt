const pro = document.getElementById("pro");
const qty = document.getElementById("qty");
const namePhone = document.getElementById("name");
const amount = document.getElementById("amount");
const btn = document.querySelector("button");
const price = 1950;

function getVal() {
  return {
    name: pro.innerText,
    amount: qty.value,
  };
}

function display(val) {
  namePhone.innerText = val.name;
  amount.innerText = price * val.amount;
}

btn.onclick = function () {
  display(getVal());
};
