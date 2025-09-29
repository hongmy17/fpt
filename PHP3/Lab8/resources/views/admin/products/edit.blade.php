@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Thêm sản phẩm</div>
                </div>
                <form action="{{ route('admin.product.update', $product->id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" value={{ $product->title }} id="title" name="title"
                                        aria-describedby="titleHelp">
                                    <div id="titleHelp" class="form-text">
                                        Vui lòng nhập tên sản phẩm
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="content" class="form-label">Nội dung sản phẩm</label>
                                    <textarea name="content" class="content" id="content">{{ $product->content }}</textarea>
                                </div>


                                <div class="mb-3">
                                    <label for="description" class="form-label">Mô tả ngắn sản phẩm</label>
                                    <textarea name="description" class="content" id="description"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Danh mục</label>
                                    <select class="form-select" name="category_id" id="category_id">
                                        @foreach ($categories as $category)
                                            <option @selected($product->category_id == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--begin::Body-->
                    </div>


                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Footer-->
                </form>
            </div>
        </div>
    </div>
@endsection


@push('style')
<link rel="stylesheet" href="{{ asset('assets/admin/richtexteditor/rte_theme_default.css') }}" />
@endpush

@push('script')
    <script type="text/javascript" src="{{ asset('assets/admin/richtexteditor/rte.js') }}"></script>
    <script type="text/javascript" src='{{ asset('assets/admin/richtexteditor/plugins/all_plugins.js') }}'></script>

    <script>
        var editor1 = new RichTextEditor("#content");
        var editor1 = new RichTextEditor("#description");
    </script>
@endpush
