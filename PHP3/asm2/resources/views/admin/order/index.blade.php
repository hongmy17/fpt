@extends('admin.layout.master')

@section('meta_title')
    Danh sách đơn hàng
@endsection

@section('content')
    <h4>Danh sách đơn hàng</h4>

    <div>
        <table class="table table-borderless table-responsive card-1">
            <thead>
                <tr class="border-bottom">
                    <th>
                        <span class="ml-1">
                            <input class="form-check-input" type="checkbox" id="checkbox-all" />
                        </span>
                    </th>
                    <th>
                        <span class="ml-1">STT</span>
                    </th>
                    <th>
                        <span class="ml-2">Người mua</span>
                    </th>
                    <th>
                        <span class="ml-2">Trạng thái</span>
                    </th>
                    <th>
                        <span class="ml-4">Hàng động</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="border-bottom">
                        <td>
                            <div class="p-2 ps-0">
                                <input class="form-check-input" type="checkbox" name="id[]" value="" />
                            </div>
                        </td>
                        <td>
                            <div class="p-2">{{ $loop->iteration }}</div>
                        </td>
                        <td>
                            <a href="#"
                                class="p-2 d-flex flex-row align-items-center mb-2 text-decoration-none text-reset">
                                <img src="{{ asset('assets/images/users/' . $order->user_avatar) }}" width="40"
                                    class="me-3 rounded-circle" />
                                <div class="d-flex flex-column ml-2">
                                    <span class="d-block font-weight-bold">{{ $order->user_name }}</span>
                                    <small class="text-muted">{{ $order->user_email }}</small>
                                </div>
                            </a>
                        </td>
                        <td>
                            <div class="p-2">
                                <span class="status text-success">&bull;</span> {{ $order->is_paid ? 'Đã thanh toán' : 'Chưa thanh toán' }}
                            </div>
                        </td>
                        <td>
                            <div class="p-2 icons">
                                <a href="{{ route('admin.order.detail', ['order_id' => $order->order_id]) }}" class="edit text-decoration-none mx-3">
                                    <i class="fas fa-info"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
          </table>
          {{ $orders->links() }}

    </div>
    </div>
@endsection
