var apiUrl = "http://localhost:3000";
var data = "/data";

const urlParam = new URLSearchParams(window.location.search);
const id = urlParam.get("id");

axios
  .get(apiUrl + data + `?id=${id}`)
  .then((res) => {
    document.getElementById("name").value = res.data[0].name;
    document.getElementById("price").value = res.data[0].price;
    document.getElementById("content").textContent = res.data[0].content;
  })
  .catch((err) => {
    console.error(err);
  });

function save() {
  const name = document.getElementById("name").value;
  const image = document.getElementById("image").value;
  const price = document.getElementById("price").value;
  const content = document.getElementById("content").value;

  let object = {
    img: image.slice(12),
    name,
    price,
    content,
    review: 24,
  };

  axios
    .patch(apiUrl + data + `/${id}`, object)
    .then((res) => {
      location.href = "./index.html";
    })
    .catch((err) => {
      console.error(err);
    });
}
