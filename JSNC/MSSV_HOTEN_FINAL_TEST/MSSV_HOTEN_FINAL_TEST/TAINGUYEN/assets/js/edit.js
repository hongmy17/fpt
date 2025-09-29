var apiUrl = "http://localhost:3000";
var data = "/blogs";

const urlParam = new URLSearchParams(window.location.search);
const id = urlParam.get("id");

axios
  .get(apiUrl + data + `?id=${id}`)
  .then((res) => {
    document.getElementById("name").value = res.data[0].name;
    document.getElementById("date").value = res.data[0].date;
    document.getElementById("img").value = res.data[0].img;
    document.getElementById("content").textContent = res.data[0].content;
  })
  .catch((err) => {
    console.error(err);
  });

function save() {
  const name = document.getElementById("name").value;
  const img = document.getElementById("img").value;
  const date = document.getElementById("date").value;
  const content = document.getElementById("content").value;

  let object = {
    img,
    name,
    date,
    content,
  };

  axios
    .patch(apiUrl + data + `/${id}`, object)
    .then((res) => {
      location.href = "../index.html";
    })
    .catch((err) => {
      console.error(err);
    });
}
