@extends('admin.layout.master')

@section('meta_title')
    Danh sách sản phẩm
@endsection


@section('content')
    <h4>Danh sách sản phẩm</h4>

    <div class="mt-3">
        <div class="table-title border-bottom pb-3">
            <div class="row">
                <div class="col-sm-4">
                    <form class="search-box" method="post" action="">
                        <input type="text" class="form-control" name="search-box" placeholder="Tìm kiếm&hellip;"
                            value="" />
                    </form>
                </div>
                <div class="col-sm-8 text-sm-end text-center mt-sm-0 mt-3">
                    <a href="{{ route('admin.product.add') }}" class="btn btn-success me-lg-2">
                        <i class="fas fa-plus-circle"></i> <span>Thêm sản phẩm</span>
                    </a>
                    <a href="#deleteEmployeeModal" class="btn btn-danger disabled" data-bs-toggle="modal" id="delete-btn">
                        <i class="fas fa-minus-circle"></i> <span>Xóa sản phẩm</span>
                    </a>
                </div>
            </div>
        </div>

        <form action="" method="post">
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
                            <span class="ml-2">Tên</span>
                        </th>
                        <th>
                            <span class="ml-2">Giá</span>
                        </th>
                        <th>
                            <span class="ml-4">Hàng động</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
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
                                <div class="p-2 d-flex flex-row align-items-center mb-2">
                                    <img src="{{ asset('assets/images/products/' . $product->thumbnail) }}" width="40"
                                        class="me-3 rounded-circle" />
                                    <div class="d-flex flex-column ml-2">
                                        <span class="d-block font-weight-bold">{{ $product->title }}</span>
                                        <small class="text-muted text-truncate" style="width: 250px;">
                                            {{ $product->description }}
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="p-2">{{ number_format($product->price, 0, '.') }}₫</div>
                            </td>
                            <td>
                                <div class="p-2 icons">
                                    <a href="{{ route('admin.product.info', ['id' => $product->id]) }}"
                                        class="edit text-decoration-none">
                                        <i class="fas fa-info"></i>
                                    </a>
                                    <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}"
                                        class="edit text-decoration-none">
                                        <i class="fas fa-pen text-warning mx-2"></i>
                                    </a>
                                    <form action="{{ route('admin.product.delete', ['id' => $product->id]) }}"
                                        method="POST" style="display: inline-block;"
                                        onsubmit="return confirm('Bạn có chắc muốn xoá sản phẩm này không?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link p-0 border-0 bg-transparent">
                                            <i class="fa fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @include('admin.components.delete-modal')
        </form>
    </div>
@endsection

@push('script')
    <script src="{{ asset('features/handleSingleDelete.js') }}"></script>
    <script src="{{ asset('features/handleCheckboxes.js') }}"></script>

    <script>
        handleCheckboxes.setCheckboxAllElement("#checkbox-all");
        handleCheckboxes.setCheckboxElements("input[name='id[]']");
        handleCheckboxes.setDeleteBtn("#delete-btn");
        handleCheckboxes.start();

        handleSingleDelete.setDeleteModal("#deleteEmployeeModal");
        handleSingleDelete.setDeleteModalDialog(".modal-dialog.modal-dialog-centered");
    </script>
@endpush
