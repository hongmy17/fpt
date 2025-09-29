var apiUrl = "http://localhost:3000";
var data = "/blogs";

function getData() {
  let html = "";

  axios({
    method: "GET",
    url: apiUrl + data,
  }).then((res) => {
    res.data.forEach((element) => {
      html += `
        <div class="col-lg-6">
          <div class="post-item last-post-item">
            <div class="thumb">
              <a href="#"
                ><img src="assets/images/${element.img}" alt=""
              /></a>
            </div>
            <div class="right-content">
              <div class="d-flex justify-content-between">
                <div class="border-first-button">
                  <a href="./pages/edit.html?id=${element.id}">Update</a>
                </div>
                <div class="border-first-button">
                  <a href="index.html" onclick="deleteItem(${element.id})">Delete</a>
                </div>
              </div>
              <span class="date">${element.date}</span>
              <a href="#">
                <h4>${element.name}</h4>
              </a>
              <p>
                ${element.content}
              </p>
            </div>
          </div>
        </div>`;
    });
    document.getElementById("showData").innerHTML = html;
  });
}

getData();

function deleteItem(id) {
  console.log(id);
}
