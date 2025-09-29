<div id="layoutSidenav_nav">
  <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
      <div class="nav">
        <a class="nav-link" href="{{ route("admin.index") }}">
          <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
          Bảng điều khiển
        </a>

        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
          <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
            Người dùng
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="{{ route("admin.user.add") }}">Thêm người dùng</a>
            <a class="nav-link" href="{{ route("admin.user.index") }}">Danh sách người dùng</a>
          </nav>
        </div>

        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
          <div class="sb-nav-link-icon"><i class="fas fa-th-large"></i></div>
          Loại hàng
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="#">Thêm loại hàng</a>
            <a class="nav-link" href="">Danh sách loại hàng</a>
            <a class="nav-link" href="">Loại hàng đã xóa</a>
          </nav>
        </div>

        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
          <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
          Sản phẩm
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="#">Thêm sản phẩm</a>
            <a class="nav-link" href="#">Danh sách sản phẩm</a>
            <a class="nav-link" href="#">Sản phẩm đã xóa</a>
          </nav>
        </div>

        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts4">
          <div class="sb-nav-link-icon"><i class="fas fa-money-check-alt"></i></i></div>
           Đơn hàng
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="#">Danh sách đơn hàng</a>
            <a class="nav-link" href="#">Đơn hàng đã xóa</a>
          </nav>
        </div>
      </div>
    </div>
  </nav>
</div>
