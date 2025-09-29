@extends('client.layout.master')

@section('meta_title')
    Cửa hàng
@endsection

@section('content')
    <!-- sidebar + content -->
    <div class="container" style="padding-top: 50px; padding-bottom: 50px">
        <div class="row">
            <!-- sidebar -->
            <div class="col-lg-3">
                <!-- Toggle button -->
                <button class="btn btn-outline-secondary mb-3 w-100 d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span>Hiển thị bộ lọc</span>
                </button>
                <!-- Collapsible wrapper -->
                <div class="collapse card d-lg-block mb-5" id="navbarSupportedContent">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseTwo" style="color: unset; background: unset">
                                    Danh mục
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                                aria-labelledby="headingTwo">
                                <div class="accordion-body" id="filter-form">
                                    <div class="list-group">
                                        <a href="{{ route('client.product.index') }}"
                                            class="list-group-item list-group-item-action">
                                            Tất cả
                                        </a>
                                        @foreach ($categories as $category)
                                            <a href="{{ route('client.product.byCategory', ['id' => $category->id]) }}"
                                                class="list-group-item list-group-item-action">
                                                {{ $category->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sidebar -->
            <!-- content -->
            <div class="col-lg-9">
                @foreach ($products as $product)
                    <div class="text-decoration-none text-dark">
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-12">
                                <div class="card shadow-0 border rounded-3 h-100 d-flex flex-column">
                                    <div class="card-body d-flex">
                                        <div class="col-xl-3 col-md-4 d-flex justify-content-center align-items-center">
                                            <a href="#!"
                                                class="bg-image hover-zoom ripple rounded ripple-surface me-md-3 mb-3 mb-md-0"
                                                style="width: 183px; height: 183px; overflow: hidden; display: block;">
                                                <img src="{{ asset('assets/images/products/' . $product->thumbnail) }}"
                                                    alt="{{ $product->title }}"
                                                    style="width: 183px; height: 183px; object-fit: cover;" />
                                                <div class="hover-overlay">
                                                    <div class="mask"
                                                        style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-xl-6 col-md-5 col-sm-7 pe-4 d-flex flex-column">
                                            <h5 class="text-truncate">{{ $product->title }}</h5>
                                            <div class="text mb-4 mb-md-0 text-truncate-4" style="text-align: justify;">
                                                {{ $product->description }}
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-5 d-flex flex-column">
                                            <div>
                                                <h4 class="mb-1 me-1">
                                                    {{ number_format($product->price, 0, ',', '.') }}₫
                                                </h4>
                                                <h6 class="text-success">Miễn phí vận chuyển</h6>
                                            </div>
                                            <div class="mt-4">
                                                <a href="{{ route('client.product.detail', ['id' => $product->id]) }}"
                                                    class="btn btn-primary shadow-0" type="button"
                                                    style="background: #333">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
