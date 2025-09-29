@extends('client.layout.master')

@section("meta_title")
  Trang chủ
@endsection

@section("content")
  <!-- Start Hero Section -->
  <div class="hero" style="background: #333;">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-5">
          <div class="intro-excerpt">
            <h1>
              Tất cả bạn cần là một cốc cà phê.
            </h1>
            <p class="mb-4">
              Có những người không thể bắt đầu ngày mà không uống một cốc cà phê mới rang và chúng tôi hiểu họ.
            </p>
            <p>
              <a href="#" class="btn btn-secondary me-2">Khám phá ngay</a>
            </p>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="hero-img-wrap">
            <img 
              src="{{ asset("assets/images/slider-coffee.png") }}" 
              class="img-fluid start-0" 
              style="object-fit: cover; width: 100%;"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Hero Section -->

  <!-- Start Product Section -->
  <div class="product-section">
    <div class="container">
      <div class="row">
        <h2 class="mb-4 section-title">Sản phẩm nổi bật</h2>

        <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
          <a class="product-item" href="#">
            <img
              src="{{ asset("assets/images/products/arabica.png") }}"
              class="img-fluid product-thumbnail"
            />
            <p><i class="fas fa-eye"></i>: 100</p>
            <h3 class="product-title">Cà phê Arabica 250g</h3>
            <strong class="product-price">
              {{-- <?php 
                $priceAfterSale = $price - ($price * $sale / 100);
                echo $this->formatNumber($priceAfterSale);
              ?> --}}
              1.000.000₫
            </strong>
            {{-- <?php
              if ($sale > 0) {
            ?>
              <span class="text-danger">
                <s><?=($this->formatNumber($price));?>₫</s>
              </span>
            <?php 
              }
            ?> --}}

          </a>
        </div>
        <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
          <a class="product-item" href="#">
            <img
              src="{{ asset("assets/images/products/arabica.png") }}"
              class="img-fluid product-thumbnail"
            />
            <p><i class="fas fa-eye"></i>: 100</p>
            <h3 class="product-title">Cà phê Arabica 250g</h3>
            <strong class="product-price">
              {{-- <?php 
                $priceAfterSale = $price - ($price * $sale / 100);
                echo $this->formatNumber($priceAfterSale);
              ?> --}}
              1.000.000₫
            </strong>
            {{-- <?php
              if ($sale > 0) {
            ?>
              <span class="text-danger">
                <s><?=($this->formatNumber($price));?>₫</s>
              </span>
            <?php 
              }
            ?> --}}

          </a>
        </div>
        <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
          <a class="product-item" href="#">
            <img
              src="{{ asset("assets/images/products/arabica.png") }}"
              class="img-fluid product-thumbnail"
            />
            <p><i class="fas fa-eye"></i>: 100</p>
            <h3 class="product-title">Cà phê Arabica 250g</h3>
            <strong class="product-price">
              {{-- <?php 
                $priceAfterSale = $price - ($price * $sale / 100);
                echo $this->formatNumber($priceAfterSale);
              ?> --}}
              1.000.000₫
            </strong>
            {{-- <?php
              if ($sale > 0) {
            ?>
              <span class="text-danger">
                <s><?=($this->formatNumber($price));?>₫</s>
              </span>
            <?php 
              }
            ?> --}}

          </a>
        </div>
        <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
          <a class="product-item" href="#">
            <img
              src="{{ asset("assets/images/products/arabica.png") }}"
              class="img-fluid product-thumbnail"
            />
            <p><i class="fas fa-eye"></i>: 100</p>
            <h3 class="product-title">Cà phê Arabica 250g</h3>
            <strong class="product-price">
              {{-- <?php 
                $priceAfterSale = $price - ($price * $sale / 100);
                echo $this->formatNumber($priceAfterSale);
              ?> --}}
              1.000.000₫
            </strong>
            {{-- <?php
              if ($sale > 0) {
            ?>
              <span class="text-danger">
                <s><?=($this->formatNumber($price));?>₫</s>
              </span>
            <?php 
              }
            ?> --}}

          </a>
        </div>

        <p class="text-center mt-4"><a href="#" class="btn">Khám phá ngay</a></p>
      </div>
    </div>
  </div>
  <!-- End Product Section -->

  <!-- Start We Help Section -->
  <div class="we-help-section">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-7 mb-5 mb-lg-0">
          <div class="imgs-grid">
            <div class="grid grid-1">
              <img src="{{ asset("assets/images/we-help-img-1.jpg") }}" alt="gói cà phê" />
            </div>
            <div class="grid grid-2">
              <img src="{{ asset("assets/images/we-help-img-2.jpg") }}" alt="Máy qua cà phê" />
            </div>
            <div class="grid grid-3">
              <img src="{{ asset("assets/images/we-help-img-3.jpg") }}" alt="Không gian oha cà phê" />
            </div>
          </div>
        </div>
        <div class="col-lg-5 ps-lg-5">
          <h2 class="section-title mb-4">
            Chúng Tôi Giúp Bạn Khám Phá Thế Giới Cà Phê
          </h2>
          <p>
            Tại đây, chúng tôi không chỉ bán cà phê mà còn mang đến cho bạn một trải nghiệm về hương vị thú vị và không gian đẹp. Chúng tôi tự hào đồng hành cùng bạn trong hành trình khám phá thế giới cà phê đa dạng và thú vị.
          </p>

          <ul class="list-unstyled custom-list my-4">
            <li>Chúng tôi cung cấp cà phê chất lượng và đa dạng</li>
            <li>Chúng tôi hỗ trợ bạn trong việc lựa chọn sản phẩm phù hợp</li>
            <li>Chúng tôi luôn sẵn sàng để tư vấn và giải đáp mọi thắc mắc</li>
            <li>Chúng tôi cam kết mang đến trải nghiệm tuyệt vời nhất cho bạn</li>
          </ul>
          <p><a href="#" class="btn">Khám phá ngay</a></p>
        </div>
      </div>
    </div>
  </div>
  <!-- End We Help Section -->

@endsection