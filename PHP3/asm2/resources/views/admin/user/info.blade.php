@extends('admin.layout.master')

@section('meta_title')
  Thông tin chi tiết
@endsection

@section('content')
<div class="container rounded" style="padding: 50px 0;">
  <div class="bg-white">
    <div class="row align-items-center account-form" enctype="multipart/form-data">
      <div class="col-md-6 border-right">
        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
          <img
            class="rounded-circle"
            width="250px"
            id="avatar"
            src="{{ asset('assets/images/users/' . $user->avatar) }}"
          />
        </div>
      </div>
      <div class="col-md-6 border-right">
        <div class="px-3 pe-lg-5 py-5">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-right">Thông tin người dùng</h4>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Tên</label
              ><input
                readonly
                type="text"
                class="form-control"
                placeholder="Linh"
                name="name"
                value="{{ $user->name }}"
              />
              <p class="field-message mb-0"></p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Email</label
              ><input
                readonly
                type="email"
                class="form-control"
                placeholder="example@gmail.com"
                name="email"
                value="{{ $user->email }}"
              />
              <p class="field-message mb-0"></p>
            </div>
          </div>
          <div class="row mt-2">
            <label for="is_admin" class="labels" style="width: unset">Quản trị</label>
            <input
              id="is_admin" 
              type="checkbox" 
              style="width: unset; width: 18px" 
              {{ $user->is_admin ? "checked" : "" }}
              disabled
            />
          </div>
          <div class="mt-5 text-center">
            <button
              class="btn btn-primary profile-button"
              style="background-color: #333"
            >
              Chỉnh sửa
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection