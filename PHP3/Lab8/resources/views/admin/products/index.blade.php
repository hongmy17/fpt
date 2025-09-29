@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Danh sách sản phẩm</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-sm" role="table">
                        <thead>
                            <tr>
                                <th style="width: 10px" scope="col">#</th>
                                <th scope="col">Task</th>
                                <th scope="col">Progress</th>
                                <th style="width: 40px" scope="col">Label</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="align-middle">
                                    <td>{{ $product->id }}.</td>
                                    <td><a href="{{ route('admin.product.edit', $product->id) }}">{{ $product->title }}</a></td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        
                                       <form action="{{ route('admin.product.delete', $product->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-danger" type="submit">Xoá</button>
                                       </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $products->render()  }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
