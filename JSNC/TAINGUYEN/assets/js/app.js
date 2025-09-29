var apiUrl = "http://localhost:3000";
var data = "/data";

function getData() {
  let html = "";

  axios({
    method: "GET",
    url: apiUrl + data,
  }).then((res) => {
    res.data.forEach((element) => {
      html += `
        <div class="col-12 col-md-4 mb-4">
          <div class="card h-100">
            <a href="">
              <img
                src="./assets/img/${element.img}"
                class="card-img-top"
                alt="${element.img}"
              />
            </a>
            <div class="card-body">
              <ul class="list-unstyled d-flex justify-content-between">
                <li>
                  <p class="text-muted">Reviews (${element.review})</p>
                </li>
                <li class="text-muted text-right">$${element.price}.00</li>
              </ul>
              <a href="" class="h2 text-decoration-none text-dark"
                >${element.name}</a
              >
              <p class="card-text">
                ${element.content}
              </p>
              <div>
                <a href="./edit.html?id=${element.id}" class="btn btn-warning px-3">Edit</a>
                <button class="btn btn-danger px-3">Delete</button>
              </div>
            </div>
          </div>
        </div>`;
    });
    document.getElementById("showData").innerHTML = html;
  });
}

getData();
