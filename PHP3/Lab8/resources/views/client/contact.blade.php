@extends('client.layouts.master')
@section('content')
    <div class="container">
        <h1>Liên hệ với Phan Văn Tính</h1>
        @if (session('success'))
            <div class="alert alert-primary">{{ session('success') }}</div>
        @endif
        <form action="{{ route('client.contact.store') }}" method="POST" enctype="multipart/form-data" class="card">
            <div class="card-body">

                <div class="mb-3">
                    <label for="name" class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name"
                        aria-describedby="nameId" placeholder="Vui lòng nhập họ tên " />
                    <small id="nameId" class="form-text text-danger">{{  $errors->first('name') }}</small>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email"
                        aria-describedby="emailHelpId" placeholder="abc@mail.com" />
                    <small id="emailHelpId" class="form-text text-muted">Vui lòng nhập email, email là bắt buộc</small>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{ old("phone") }}" aria-describedby="phoneId"
                        placeholder="Vui lòng nhập số điện thoại" />
                    <small id="phoneId" class="form-text text-muted">Vui lòng nhập số điện thoại</small>
                </div>


                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{ old("address") }}" aria-describedby="addressId"
                        placeholder="Vui lòng nhập địa chỉ" />
                    <small id="addressId" class="form-text text-muted">Vui lòng nhập địa chỉ</small>
                </div>


                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề</label>
                    <input type="text" class="form-control" value="{{ old('title') }}" name="title" id="title" aria-describedby="titleId"
                        placeholder="Vui lòng nhập tiêu đề" />
                    <small id="titleId" class="form-text text-muted">Vui lòng nhập tiêu đề</small>
                </div>



                <div class="mb-3">
                    <label for="description" class="form-label">Nội dung</label>
                    <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">Choose file</label>
                    <input type="file" class="form-control" name="file" id="file"
                        placeholder="Vui lòng chọn file" aria-describedby="fileId" />
                    <div id="fileId" class="form-text">Vui lòng chọn file minh hoạ</div>
                </div>

                {{-- tên, email, số điện thoại, địa chỉ, tiêu đề, mô tả, file ảnh --}}


                <button class="btn btn-primary">Gửi đi</button>
            </div>
            @csrf

        </form>
    </div>
@endsection
