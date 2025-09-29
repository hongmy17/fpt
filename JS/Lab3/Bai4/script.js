var arr = ["Rock", "Paper", "Scissors"];
var random;

function getRandom() {
  random = arr[Math.floor(Math.random() * 3)];
}

function run(val) {
  if (val === random) alert("Hoa");
  else if (
    (val === "Rock" && random === "Scissors") ||
    (val === "Paper" && random === "Rock") ||
    (val === "Scissors" && random === "Paper")
  )
    alert("Ban Da Thang");
  else alert("May da thang");
  getRandom();
}

getRandom();
