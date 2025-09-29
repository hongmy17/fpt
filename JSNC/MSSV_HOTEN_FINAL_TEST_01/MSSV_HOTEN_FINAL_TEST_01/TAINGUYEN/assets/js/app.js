var apiUrl = "http://localhost:3000";
var data = "/products";

function getData() {
  let html = "";

  axios({
    method: "GET",
    url: apiUrl + data,
  }).then((res) => {
    res.data.forEach((element) => {
      html += `
        <div class="col-md-4">
          <div class="product-item">
            <a href="#"><img src="assets/images/${element.img}" alt="" /></a>
            <div class="down-content">
              <a href="#"><h4>${element.name}</h4></a>
              <h6>$${element.price}</h6>
              <p>
                ${element.content}
              </p>
              <ul class="stars">
                <li>
                  <button class="btn"><i class="fa fa-edit"></i></button>
                </li>
                <li>
                  <button class="btn"><i class="fa fa-trash"></i></button>
                </li>
              </ul>
              <span>Reviews (${element.reviews})</span>
            </div>
          </div>
        </div>`;
    });
    document.getElementById("showData").innerHTML += html;
  });
}

getData();

function deleteItem(id) {
  console.log(id);
}
