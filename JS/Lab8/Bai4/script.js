let inp = document.querySelector("input");
if (localStorage.getItem("futureTime")) {
  inp.value = localStorage.getItem("futureTime");
  run();
}

function run() {
  let futureTime = new Date(inp.value);
  let currentTime = new Date();
  let remainder = parseInt((futureTime - currentTime) / 1000);

  if (remainder <= 0) {
    alert("Moi chon ngay khac");
    inp.value = null;
    return;
  }

  let day = document.getElementById("day");
  let hour = document.getElementById("hour");
  let minute = document.getElementById("minute");
  let second = document.getElementById("second");

  inp.readOnly = "true";
  localStorage.setItem("futureTime", inp.value);
  day.innerText = parseInt(remainder / 86400);
  hour.innerText = parseInt((remainder % 86400) / 3600);
  minute.innerText = parseInt((remainder % 3600) / 60);
  remainder--;

  let myInterval = setInterval(function () {
    if (remainder == 0) {
      clearInterval(myInterval);
      inp.removeAttribute("readOnly");
      localStorage.clear();
      inp.value = null;
      second.innerText = 0;
      setTimeout(function () {
        alert("Finish");
      }, 100);
    } else {
      if (second.innerText == 0) {
        day.innerText = parseInt(remainder / 86400);
        hour.innerText = parseInt((remainder % 86400) / 3600);
        minute.innerText = parseInt((remainder % 3600) / 60);
      }

      second.innerText = parseInt(remainder % 60);
      remainder--;
    }
  }, 1000);
}
