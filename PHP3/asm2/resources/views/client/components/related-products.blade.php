@foreach ($relateProducts as $product)
    <div class="col-lg-4">
        <div class="px-0 border rounded-2 shadow-0">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title text-start">Sản phẩm tương tự</h5>
                    <div class="text-start">
                        <div class="d-flex align-items-center mb-3">
                            <a href="{{ route('client.product.detail', ['id' => $product->id]) }}" class="me-3">
                                <img src="{{ asset('assets/images/products/' . $product->thumbnail) }}"
                                    style="max-width: 96px; height: 96px; object-fit: cover"
                                    class="img-md img-thumbnail" />
                            </a>
                            <div class="info">
                                <a href="{{ route('client.product.detail', ['id' => $product->id]) }}"
                                    class="nav-link mb-1 p-0 text-truncate-2 text-black fs-6">
                                    {{ $product->title }}
                                </a>
                                <strong class="text-dark">
                                    {{ number_format($product->price, 0, ',') }}₫
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

{{ $relateProducts->links() }}