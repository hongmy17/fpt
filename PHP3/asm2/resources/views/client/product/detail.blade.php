@extends('client.layout.master')

@section('meta_title', 'Chi tiết')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row gx-5">
                <!-- Ảnh sản phẩm -->
                <aside class="col-lg-6">
                    <div class="border rounded-4 mb-3 d-flex justify-content-center">
                        <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image"
                            href="{{ asset('assets/images/products/' . $product->thumbnail) }}">
                            <img src="{{ asset('assets/images/products/' . $product->thumbnail) }}"
                                alt="{{ $product->title }}" class="rounded-4 img-fluid" />
                        </a>
                    </div>
                </aside>

                <!-- Thông tin sản phẩm -->
                <main class="col-lg-6">
                    <div class="ps-lg-3">
                        <h4 class="title text-dark">{{ $product->title }}</h4>

                        <div class="mb-3">
                            <span class="h5">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                            <span class="text-muted"> / mỗi sản phẩm</span>
                        </div>

                        <p style="text-align: justify;">{{ $product->description }}</p>

                        <hr>
                        <form action="{{ route('client.cart.add', ['product_id' => $product->id]) }}" method="post"
                            class="d-flex align-items-center gap-3">
                            @csrf

                            <div style="display: flex; flex-direction: column; align-items: center;">
                                <div class="input-group">
                                    <button class="btn btn-outline-secondary" type="button" id="btn-minus"
                                        aria-label="Giảm số lượng">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input style="width: 100px" type="number" id="quantity-input" name="quantity"
                                        class="form-control text-center" value="1" aria-label="Số lượng sản phẩm" />
                                    <button class="btn btn-outline-secondary" type="button" id="btn-plus"
                                        aria-label="Tăng số lượng">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-dark w-100 shadow-sm">
                                    <i class="me-1 fa fa-shopping-basket"></i> Thêm vào giỏ hàng
                                </button>
                            </div>
                        </form>


                    </div>
                </main>
            </div>
        </div>
    </section>

    <section class="bg-light border-top py-5">
        <div class="container position-relative">
            <div class="row gx-4">
                @include('client.components.return-policy')
                @include('client.components.related-products')
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const minusBtn = document.getElementById('btn-minus');
            const plusBtn = document.getElementById('btn-plus');
            const quantityInput = document.getElementById('quantity-input');

            minusBtn.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value) || 1;
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });

            plusBtn.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value) || 1;
                quantityInput.value = currentValue + 1;
            });

            quantityInput.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
                if (this.value === '' || this.value === '0') {
                    this.value = 1;
                }
            });
        });
    </script>
@endpush
