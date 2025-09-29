var a, b, o;
function thuc_hien() {
  if (!a) alert("Moi nhap toan hang thu nhat");
  else if (!o) alert("Moi nhap toan tu");
  else if (!b) alert("Moi nhap toan hang thu hai");
  else {
    switch (o) {
      case "+":
        alert("Tong: " + (a + b));
        break;
      case "-":
        alert("Hieu: " + (a - b));
        break;
      case "x":
        alert("Tich: " + a * b);
        break;
      case ":":
        alert("Thuong: " + a / b);
        break;
    }
    lam_lai();
  }
}

function toan_hang(x) {
  if (!a) a = x;
  else if (!b) b = x;
}

function toan_tu(x) {
  o = x;
}

function lam_lai() {
  a = b = o = undefined;
}
