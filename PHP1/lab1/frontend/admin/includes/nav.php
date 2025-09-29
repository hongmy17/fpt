<nav class="navbar bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Offcanvas navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./index.php">Quan ly khach hang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./quanlynhanvien.php">Quan ly nhan vien</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./quanlysanpham.php">Quan ly san pham</a>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search" action="login.php">
          <button class="btn btn-outline-success" type="submit">Dang nhap</button>
        </form>
      </div>
    </div>
  </div>
</nav>