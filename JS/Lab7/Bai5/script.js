var btn = document.querySelector("button");
btn.onclick = function () {
  event.preventDefault();
  var formGroups = document.querySelectorAll(".form-group");

  formGroups[0].querySelector("h3").innerText =
    formGroups[0].querySelector("input").value == "" ? "Moi nhap san pham" : "";

  formGroups[1].querySelector("h3").innerText =
    formGroups[1].querySelector("input").value == "" ? "Moi chon loai" : "";

  formGroups[2].querySelector("h3").innerText =
    formGroups[2].querySelector("input").value == ""
      ? "Moi nhap san pham"
      : Number(formGroups[2].querySelector("input").value) > 0
      ? ""
      : "Don gia phai la so duong";

  if (
    formGroups[3].querySelector("input").checked ||
    formGroups[3].querySelector("input").nextElementSibling.checked
  ) {
    formGroups[3].querySelector("h3").innerText = "";

    formGroups[3].querySelector(".phi-van-chuyen").style.display =
      formGroups[3].querySelector("input").nextElementSibling.checked
        ? "block"
        : "none";
  } else {
    formGroups[3].querySelector("h3").innerText = "Moi chon noi nhan hang";
  }
};
