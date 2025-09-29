const apiUrl = "http://localhost:3000";
const data = "/blogs";

function toggleDisplayElement(val, element) {
  if (val) {
    element.classList.add("d-none");
  } else {
    element.classList.remove("d-none");
  }
}

function save() {
  const name = document.getElementById("name").value;
  const img = document.getElementById("img").value;
  const date = document.getElementById("date").value;
  const content = document.getElementById("content").value;

  const nameMessage = document.getElementById("name-message");
  const imgMessage = document.getElementById("img-message");
  const dateMessage = document.getElementById("date-message");
  const contentMessage = document.getElementById("content-message");

  let object = {
    img,
    name,
    date,
    content,
  };

  toggleDisplayElement(name, nameMessage);
  toggleDisplayElement(img, imgMessage);
  toggleDisplayElement(date, dateMessage);
  toggleDisplayElement(content, contentMessage);

  if (name && img && date && content) {
    axios({
      method: "POST",
      url: apiUrl + data,
      data: object,
    })
      .then((res) => {
        console.log(res);
      })
      .catch((err) => {
        console.log(err);
      });
  }
}
