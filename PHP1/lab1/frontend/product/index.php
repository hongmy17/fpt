<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
  </head>

  <body>
    <header>
      <img src="./img/pic.jpg" alt="" class="w-100">
    </header>

    <div class="container">
      <!-- navbar -->
      <?php 
        include ('includes/nav.php');
      ?>
      <!-- end navbar -->

      <!-- banner -->
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./img/pic.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./img/pic.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./img/pic.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <!-- end banner -->

      <!-- content -->
      <div class="row">
        <article class="col-md-8">
          <h2>Danh sach san pham</h2>

          <div class="row">
            <div class="card mx-1 mt-2" style="flex: 20%;">
              <img src="./img/pic.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the</p>
              </div>
            </div>
            <div class="card mx-1 mt-2" style="flex: 20%;">
              <img src="./img/pic.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the</p>
              </div>
            </div>
            <div class="card mx-1 mt-2" style="flex: 20%;">
              <img src="./img/pic.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the</p>
              </div>
            </div>
            <div class="card mx-1 mt-2" style="flex: 20%;">
              <img src="./img/pic.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the</p>
              </div>
            </div>
            <div class="card mx-1 mt-2" style="flex: 20%;">
              <img src="./img/pic.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the</p>
              </div>
            </div>
            <div class="card mx-1 mt-2" style="flex: 20%;">
              <img src="./img/pic.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the</p>
              </div>
            </div>
            <div class="card mx-1 mt-2" style="flex: 20%;">
              <img src="./img/pic.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the</p>
              </div>
            </div>
            <div class="card mx-1 mt-2" style="flex: 20%;">
              <img src="./img/pic.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the</p>
              </div>
            </div>
          </div>
        </article>

        <aside class="col-md-4">
          <h2>Danh muc san pham</h2>

          <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  Accordion Item #1
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                  <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                      The current link item
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">A second link item</a>
                    <a href="#" class="list-group-item list-group-item-action">A third link item</a>
                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                    <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                  Accordion Item #2
                </button>
              </h2>
              <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                  Accordion Item #3
                </button>
              </h2>
              <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
              </div>
            </div>
          </div>
        </aside>
      </div>
      <!-- end content -->

      <!-- Modal -->
      <div class="modal fade" id="frmLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="row g-3 needs-validation was-validated">
                <div class="col-md-4">
                  <label for="validationCustom01" class="form-label">First name</label>
                  <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="validationCustom02" class="form-label">Last name</label>
                  <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="validationCustomUsername" class="form-label">Username</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                      Please choose a username.
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="validationCustom03" class="form-label">City</label>
                  <input type="text" class="form-control" id="validationCustom03" required>
                  <div class="invalid-feedback">
                    Please provide a valid city.
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="validationCustom04" class="form-label">State</label>
                  <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <option>...</option>
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid state.
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="validationCustom05" class="form-label">Zip</label>
                  <input type="text" class="form-control" id="validationCustom05" required>
                  <div class="invalid-feedback">
                    Please provide a valid zip.
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                      Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                      You must agree before submitting.
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
              </form>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal -->
    </div>

    <footer>MSSV HOTEN</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>