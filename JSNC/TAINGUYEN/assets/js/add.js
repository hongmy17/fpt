var apiUrl = "http://localhost:3000";
var data = "/data";

function toggleDisplayElement(val, element) {
  if (val) {
    element.classList.add("d-none");
  } else {
    element.classList.remove("d-none");
  }
}

function save() {
  const name = document.getElementById("name").value;
  const image = document.getElementById("image").value;
  const price = document.getElementById("price").value;
  const content = document.getElementById("content").value;

  const nameMessage = document.getElementById("name-message");
  const imageMessage = document.getElementById("image-message");
  const priceMessage = document.getElementById("price-message");
  const contentMessage = document.getElementById("content-message");

  let object = {
    img: image.slice(12),
    name,
    price,
    content,
    review: 24,
  };
  console.log(object);

  toggleDisplayElement(name, nameMessage);
  toggleDisplayElement(image, imageMessage);
  toggleDisplayElement(price, priceMessage);
  toggleDisplayElement(content, contentMessage);

  if (name && image && price && content) {
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
