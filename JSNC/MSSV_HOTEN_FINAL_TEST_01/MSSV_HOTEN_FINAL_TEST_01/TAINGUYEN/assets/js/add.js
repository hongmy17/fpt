var apiUrl = "http://localhost:3000";
var data = "/products";

function save() {
  const name = document.getElementById("name").value;
  const price = document.getElementById("price").value;
  const reviews = document.getElementById("reviews").value;
  const img = document.getElementById("img").value;
  const content = document.getElementById("content").value;

  const obj = {
    name: name,
    price: price,
    content: content,
    reviews: reviews,
    img: img,
  };

  console.log(obj);
}
