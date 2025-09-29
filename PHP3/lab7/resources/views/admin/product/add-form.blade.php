@extends('admin.layout.master')

@section('meta_title')
    Thêm sản phẩm
@endsection

@section('content')
    <div class="container rounded" style="padding: 50px 0;">
        <div class="bg-white">
            <form action="{{ route('admin.product.store') }}" method="post" class="row align-items-center edit-form"
                enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle" width="300px" id="avatar"
                            src="{{ asset('assets/images/products/default-product-image.png') }}" />
                        <input type="file" style="width: 200px;" class="mt-4" name="avatar" />
                    </div>
                </div>
                <div class="col-md-6 border-right">
                    <div class="px-3 pe-lg-5 py-5">
                        <div class="d-flex justerrory-content-between align-items-center mb-3">
                            <h4 class="text-right">Thêm sản phẩm</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Tên</label><input type="text" class="form-control" placeholder="Cà phê"
                                    name="name" value="{{ old('name') }}" />
                                <p class="field-message mb-0">
                                    @error (('name'))
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Mô tả</label>
                                <textarea class="form-control" cols="30" rows="4" name="description" placeholder="Mô tả" >{{ old('description') }}</textarea>
                                <p class="field-message mb-0">
                                    @error (('description'))
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Giá</label><input type="number" class="form-control" name="price"
                                    placeholder="VD: 100000" value="{{ old('price') }}" />
                                <p class="field-message mb-0">
                                    @error (('price'))
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Thể loại</label>
                                <select type="text" class="form-control" name="category_id">
                                    <option value="">Chọn thể loại</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <p class="field-message mb-0">
                                    @error (('category_id'))
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" style="background-color: #333">Thêm</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
