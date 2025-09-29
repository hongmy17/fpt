@extends('client.layouts.master')
@section('content')
{{ $product->title }}
@endsection
@push('style')
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.css"
    />
@endpush


@push('script')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.umd.js"></script>
@endpush