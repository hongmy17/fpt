@extends('admin.layout.master')

@section('meta_title')
    Chi tiết sản phẩm
@endsection

@section('content')
    <div class="container rounded" style="padding: 50px 0;">
        <div class="bg-white">
            <div class="row align-items-center account-form">
                <div class="col-md-6 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle" width="300px" id="avatar"
                            src="{{ asset('assets/images/products/' . $product->thumbnail) }}" />
                    </div>
                </div>
                <div class="col-md-6 border-right">
                    <div class="px-3 pe-lg-5 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Thông tin sản phẩm</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Tên</label><input readonly type="text" class="form-control"
                                    placeholder="Linh" value="{{ $product->title }}" name="name" />
                                <p class="field-message mb-0"></p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Mô tả</label>
                                <textarea class="form-control" cols="30" rows="4" name="description">{{ $product->description }}</textarea>
                                <p class="field-message mb-0"></p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Giá</label><input readonly type="number" class="form-control"
                                    value="{{ $product->price }}" name="price" />
                                <p class="field-message mb-0"></p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Thể loại</label><input readonly type="text" class="form-control"
                                    value="{{ $category->name }}" name="categories" />
                                <p class="field-message mb-0"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
