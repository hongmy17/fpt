@extends('admin.layout.master')

@section('meta_title')
    Chi tiết đơn hàng
@endsection

@section('content')
    <h4>Chi tiết đơn hàng</h4>

    <div class="mt-3">
        <form action="" method="post">
            <table class="table table-borderless table-responsive card-1">
                <thead>
                    <tr class="border-bottom">
                        <th>
                            <span class="ml-1">STT</span>
                        </th>
                        <th>
                            <span class="ml-2">Sản phẩm</span>
                        </th>
                        <th>
                            <span class="ml-2">Giá</span>
                        </th>
                        <th>
                            <span class="ml-2">Số lượng</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalPrice = 0;
                    @endphp

                    @foreach ($orderDetails as $order)
                        @php
                            $price = $order->price * $order->quantity;
                            $totalPrice += $price;
                        @endphp

                        <tr class="border-bottom">
                            <td>
                                <div class="p-2">{{ $loop->iteration }}</div>
                            </td>
                            <td>
                                <a href="{{ route('admin.product.info', ['id' => $order->product_id]) }}"
                                    class="p-2 d-flex flex-row align-items-center mb-2 text-decoration-none text-reset">
                                    <img src="{{ asset('assets/images/products/' . $order->thumbnail) }}" width="40"
                                        class="me-3 rounded-circle" />
                                    <div class="d-flex flex-column ml-2">
                                        <span class="d-block font-weight-bold">{{ $order->title }}</span>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <div class="p-2">{{ number_format($order->price, 0, ',') }}₫</div>
                            </td>
                            <td>
                                <div class="p-2 d-flex flex-column">{{ $order->quantity }}</div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="border-top">
                        <td colspan="2"></td>
                        <td class="fw-bold">Tổng tiền:</td>
                        <td class="fw-bold">{{ number_format($totalPrice, 0, ',') }}₫</td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
@endsection
