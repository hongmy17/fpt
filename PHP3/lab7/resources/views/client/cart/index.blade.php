@extends('client.layout.master')

@section('meta_title')
    Giỏ hàng
@endsection

@section('content')
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-start h-100">

                <div class="col-lg-8 position-relative">
                    <h5 class="mb-3">
                        <a href="{{ route('client.product.index') }}" class="text-body text-decoration-none">
                            <i class="fas fa-long-arrow-alt-left me-2"></i> Tiếp tục mua sắm
                        </a>
                    </h5>
                    <hr>

                    @php $totalPrice = 0; @endphp

                    @if ($orderDetails->isEmpty())
                        <div class="d-flex flex-column align-items-center justify-content-center" style="height: 300px;">
                            <img src="{{ asset('assets/images/products/empty-cart.png') }}" alt="Giỏ hàng trống"
                                style="max-width: 200px; object-fit: contain;">
                            <h5 class="mt-3">Giỏ hàng trống</h5>
                        </div>
                    @else
                        @foreach ($orderDetails as $order)
                            @php
                                $price = $order->price * $order->quantity;
                                $totalPrice += $price;
                            @endphp
                            <div class="card mb-3 shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('client.product.detail', ['id' => $order->product_id]) }}"
                                            class="d-flex align-items-center text-decoration-none text-dark flex-grow-1">
                                            <img src="{{ asset('assets/images/products/' . $order->thumbnail) }}"
                                                alt="{{ $order->title }}" class="img-fluid rounded-3"
                                                style="width: 70px; height: 70px; object-fit: cover;">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-1 text-truncate">{{ $order->title }}</h6>
                                            </div>
                                        </a>
                                        <div class="text-center" style="min-width: 100px;">
                                            <strong>{{ number_format($order->price, 0, ',', '.') }}₫</strong>
                                        </div>
                                        <div class="text-center" style="min-width: 80px;">
                                            <span>{{ $order->quantity }}</span>
                                        </div>
                                        <div class="text-center" style="min-width: 120px;">
                                            <strong>{{ number_format($price, 0, ',', '.') }}₫</strong>
                                        </div>
                                        <form
                                            action="{{ route('client.cart.delete', ['order_details_id' => $order->order_details_id]) }}"
                                            method="post" class="text-center" style="min-width: 40px;"
                                            onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này không?');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-link p-0 text-danger" title="Xóa sản phẩm"
                                                style="border: none; background: none;">
                                                <i class="fas fa-trash fa-lg"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="col-lg-4">
                    <form action="{{ route('client.cart.pay', ['order_id' => $orderID]) }}" method="post"
                        class="card shadow-sm rounded-3">
                        @csrf
                        <div class="card-body">
                            <h5 class="mb-4">Chi tiết đơn hàng</h5>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Thành tiền</span>
                                <strong class="fs-5">{{ number_format($totalPrice, 0, ',', '.') }}₫</strong>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 btn-lg"
                                {{ $totalPrice == 0 ? 'disabled' : '' }}>
                                Thanh toán <i class="fas fa-long-arrow-alt-right ms-2"></i>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
