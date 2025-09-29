@extends('admin.layout.master')

@section('meta_title')
    Sửa doanh mục
@endsection

@section('content')
    <div class="container rounded" style="padding: 50px 0;">
        <div class="bg-white">
            <div class="row align-items-center">
                <div class="col-md-6 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img width="250px" src="{{ asset('assets/images/products/default-product-image.png') }}" />
                    </div>
                </div>

                <div class="col-md-6 border-right">
                    <form action="{{ route('admin.category.update', ['id' => $category->id]) }}" method="post"
                        class="px-3 ps-lg-5 py-5 sign-up-form">
                        @csrf
                        @method('put')
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Chỉnh sửa loại hàng</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Tên</label>
                                <input type="text" class="form-control" placeholder="Ao" name="name"
                                    value="{{ $category->name }}" />
                                <p class="field-message mb-0">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" style="background-color: #333">
                                Lưu
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
