var myWindow;
var isClosed = true;
function openWindow() {
  myWindow = window.open("", "new", "toolbar=yes,scrollbars=yes");
  isClosed = false;
}

function closeWindow() {
  myWindow.close();
  isClosed = true;
}

function checkWindow() {
  if (isClosed) alert("Cửa số mới đã được đóng");
  else alert("Cửa số mới chưa được đóng");
}
