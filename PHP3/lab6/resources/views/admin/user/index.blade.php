@extends('admin.layout.master')

@section('meta_title')
  Danh sách người dùng
@endsection

@section('content')
@if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

<h4>Danh sách người dùng</h4>

<div class="mt-3">
  <div class="table-title border-bottom pb-3">
    <div class="row">
      <div class="col-sm-4">
        <form class="search-box" method="post" action="">
          <input
            type="text"
            class="form-control"
            name="search-box"
            placeholder="Tìm kiếm&hellip;"
          />
        </form>
      </div>
      <div class="col-sm-8 text-sm-end text-center mt-sm-0 mt-3">
        <a href="{{ route("admin.user.add") }}" class="btn btn-success me-lg-2">
          <i class="fas fa-plus-circle"></i> <span>Thêm người dùng</span>
        </a>
        <a href="#deleteEmployeeModal" class="btn btn-danger disabled" data-bs-toggle="modal" id="delete-btn">
          <i class="fas fa-minus-circle"></i> <span>Xóa người dùng</span>
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
            <span class="ml-2">Trạng thái</span>
          </th>
          <th>
            <span class="ml-2">Vai trò</span>
          </th>
          <th>
            <span class="ml-4">Hàng động</span>
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr class="border-bottom">
            <td>
              <div class="p-2 ps-0">
                <input
                  class="form-check-input"
                  type="checkbox"
                  name="id[]"
                  value=""
                />
              </div>
            </td>
            <td>
              <div class="p-2">{{ $loop->iteration }}</div>
            </td>
            <td>
              <div class="p-2 d-flex flex-row align-items-center mb-2">
                <img
                  src="{{ asset('assets/images/users/person_1.jpg') }}"
                  width="40"
                  class="me-3 rounded-circle"
                />
                <div class="d-flex flex-column ml-2">
                  <span class="d-block font-weight-bold">{{ $user->name }}</span>
                  <small class="text-muted">{{ $user->email }}</small>
                </div>
              </div>
            </td>
            <td>
              <div class="p-2">
                <span class="status text-success">&bull;</span> Tồn tại</td>
              </div>
            </td>
            <td>
              <div class="p-2 d-flex flex-column">
                <span>
                  {{ $user->is_admin ? "Admin" : "Khách hàng" }}
                </span>
              </div>
            </td>
            <td>
              <div class="p-2 icons">
                <a href="{{ route("admin.user.info", ["id" => $user->id]) }}" class="edit text-decoration-none">
                  <i class="fas fa-info"></i>
                </a>
                <a href="{{ route("admin.user.edit", ["id" => $user->id]) }}" class="edit text-decoration-none">
                  <i class="fas fa-pen text-warning mx-2"></i>
                </a>
                <form action="{{ route('admin.user.delete', ['id' => $user->id]) }}" method="POST" style="display:inline" onsubmit="return confirm('Bạn có chắc chắn muốn xoá người dùng này?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-link text-danger p-0 m-0 align-baseline">
                    <i class="fa fa-trash"></i>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $users->links() }}

    @include('admin.components.delete-modal')
  </form>
</div>
@endsection

@push('script')

<script src="{{ asset("features/handleSingleDelete.js") }}"></script>
<script src="{{ asset("features/handleCheckboxes.js") }}"></script>

<script>
  handleCheckboxes.setCheckboxAllElement("#checkbox-all");
  handleCheckboxes.setCheckboxElements("input[name='id[]']");
  handleCheckboxes.setDeleteBtn("#delete-btn");
  handleCheckboxes.start();

  handleSingleDelete.setDeleteModal("#deleteEmployeeModal");
  handleSingleDelete.setDeleteModalDialog(".modal-dialog.modal-dialog-centered");
</script>
@endpush