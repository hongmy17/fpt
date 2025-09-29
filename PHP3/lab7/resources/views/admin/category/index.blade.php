@extends('admin.layout.master')

@section('meta_title')
    Danh sách doanh mục
@endsection

@section('content')
    <h4>Danh sách loại hàng</h4>

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
                    <a href="{{ route('admin.category.add') }}" class="btn btn-success me-lg-2">
                        <i class="fas fa-plus-circle"></i> <span>Thêm loại hàng</span>
                    </a>
                    <a href="#" class="btn btn-danger disabled" data-bs-toggle="modal" id="delete-btn">
                        <i class="fas fa-minus-circle"></i> <span>Xóa loại hàng</span>
                    </a>
                </div>
            </div>
        </div>

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
                            <span class="ml-2">Tên</span>
                        </th>
                        <th>
                            <span class="ml-4">Hàng động</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
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
                                    <div class="d-flex flex-column ml-2">
                                        <span class="d-block font-weight-bold">{{ $category->name }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="p-2 icons">
                                    <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}"
                                        class="edit text-decoration-none">
                                        <i class="fas fa-pen text-warning mx-2"></i>
                                    </a>
                                    <form action="{{ route('admin.category.delete', ['id' => $category->id]) }}"
                                        method="POST" style="display:inline;"
                                        onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                                            <i class="fa fa-trash text-danger"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $categories->links() }}

        </div>
    </div>
@endsection
