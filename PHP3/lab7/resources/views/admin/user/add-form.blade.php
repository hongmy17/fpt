@extends('admin.layout.master')

@section('meta_title')
  Thêm người dùng
@endsection

@section('content')
<div class="container rounded" style="padding: 50px 0;">
  <div class="bg-white">
    <form action="{{ route('admin.user.store') }}" method="post" class="row align-items-center sign-up-form" enctype="multipart/form-data">
      @csrf
      <div class="col-md-6 border-right">
        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
          <img
            class="rounded-circle"
            width="250px"
            id="avatar"
            src="{{ asset('assets/images/users/default-user-image.webp') }}"
          />
          <input type="file" style="width: 200px;" class="mt-4" name="avatar" />
        </div>
      </div>

      <div class="col-md-6 border-right">
        <div class="px-3 ps-lg-5 py-5">
          <div class='alert alert-danger border-0 p-0 text-center'>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-right">Thêm người dùng</h4>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Tên</label
              ><input
                type="text"
                class="form-control"
                placeholder="VD: Linh"
                name="name"
                value="{{ old('name') }}"
              />
              <p class="field-message mb-0">
                @error('name')
                  {{ $message }}
                @enderror
              </p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Email</label
              ><input
                type="email"
                class="form-control"
                placeholder="VD: example@gmail.com"
                name="email"
                value="{{ old('email') }}"
              />
              <p class="field-message mb-0">
                @error('email')
                  {{ $message }}
                @enderror
              </p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Mật khẩu</label>
              <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu tại đây" />
              <p class="field-message mb-0">
                @error('password')
                  {{ $message }}
                @enderror
              </p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Xác nhận mật khẩu</label>
              <input type="password" class="form-control" name="confirm_password" placeholder="Nhập xác nhận mật khẩu tại đây" />
              <p class="field-message mb-0">
                @error('confirm_password')
                  {{ $message }}
                @enderror
              </p>
            </div>
          </div>
          <div class="mt-5 text-center">
            <button
              class="btn btn-primary profile-button"
              style="background-color: #333"
            >
            Thêm
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
