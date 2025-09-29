<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark fixed-top" style="background: #333 !important" aria-label="Furni navigation bar">
  <div class="container">
    <a class="navbar-brand" href="{{ route("client.home.index") }}">CoffeeShop</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsFurni">
      <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route("client.home.index") }}">Trang chủ</a>
        </li>
        <li><a class="nav-link" href="{{ route("client.home.about") }}">Giới thiệu</a></li>
        <li><a class="nav-link" href="{{ route("client.product.index") }}">Cửa hàng</a></li>
        <li><a class="nav-link" href="{{ route("client.contact.index") }}">Liên hệ</a></li>
        @if(Auth::user() && Auth::user()->is_admin)
          <li><a class="nav-link" href="{{ route("admin.index") }}">Admin</a></li>
        @endif
      </ul>

      <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
        <li class="me-0">
          <a class="nav-link" href="{{ route("client.cart.index") }}">
            <img src="{{ asset("assets/images/cart.svg") }}" />
          </a>
        </li>
        <li>
          <div class="dropdown">
            <button class="btn nav-link bg-transparent dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="border: none;">
              <img src="{{ asset("assets/images/user.svg") }}" />
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
              @if(Auth::user())
                <li><a class="dropdown-item" href="{{ route("client.profile.index") }}">Thông tin</a></li>
                <li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Đăng xuất</button>
                  </form>
                </li>
              @else
                <li><a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a></li>
                <li><a class="dropdown-item" href="{{ route('register') }}">Đăng ký</a></li>
              @endif
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>