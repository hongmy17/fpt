@extends('client.layouts.master')
@section('content')
    @foreach ($products as $pro)
        <p><a href="/chi-tiet-san-pham/{{$pro->id}}">{{ $pro->title }}</a></p>
    @endforeach
@endsection
@section('meta_title')
    Trang tin trong loại
@endsection