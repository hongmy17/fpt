@extends('client.layout.master')

@section('meta_title')
  Liên hệ
@endsection

@section('content')
<div class="container rounded" style="padding-top: 50px; padding-bottom: 50px">
  <div class="bg-white">
    <div class="row align-items-center">
      <div class="col-md-6 border-right">
        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
          <img width="250px" src="{{ asset("assets/images/contact.png") }}" />
        </div>
      </div>
      <form action="{{ route('client.contact.store') }}" enctype="multipart/form-data" method="post" class="col-md-6 border-right contact-form">
        @csrf
        <div class="px-3 pe-lg-5 py-5">
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Tên</label>
              <input type="text" class="form-control" placeholder="Linh" name="name" value="{{ old('name') }}" />
              <p class="field-message mb-0">
                @error('name')
                  {{ $message }}
                @enderror
              </p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Tiêu đề</label>
              <input type="title" class="form-control" placeholder="Tiêu đề" name="title" value="{{ old('title') }}" />
              <p class="field-message mb-0">
                @error('title')
                  {{ $message }}
                @enderror
              </p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">SDT</label>
              <input type="text" class="form-control" placeholder="0897561232" name="phone" value="{{ old('phone') }}" />
              <p class="field-message mb-0">
                @error('phone')
                  {{ $message }}
                @enderror
              </p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label class="labels">Lời nhắn</label>
              <textarea name="description" class="form-control" id="description" cols="30" rows="4" placeholder="Tôi gửi lời nhắn này với mục đích ..."></textarea>
              <p class="field-message mb-0">
                @error('description')
                  {{ $message }}
                @enderror
              </p>
            </div>
          </div>
          <div class="mt-5 text-center">
            <button class="btn btn-primary profile-button" style="background-color: #333">Gửi</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection