@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{asset('adminAdd/product/index/list.css')}}">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{asset('adminAdd/product/index/list.js')}}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>tìm thấy {{count($total)}} sản phẩm</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="col-md-12">
                <div class="container-fluid ">
                    <div class="row">
{{--                        <div class="col-md-12">--}}
{{--                            <a href="{{route('products.create')}}" class="btn btn-primary m-2  float-right ">Add</a>--}}
{{--                        </div>--}}
                        <div class="col-md-12">
                            <table class="table table-light">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">giá</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($products as $product)

                                    <tr>
                                        <th scope="row">{{ $product->id }}</th>
                                        <td>{{$product->name}}</td>
                                        <td><img class="product_image" src="{{asset($product->feature_image_path)}}"></td>
                                        <td>{{number_format($product->price)}}</td>
                                        <td>{{optional($product->category)->name}}</td>
                                        <td>
                                            <a href="{{route('products.edit',['id'=>$product->id])}}" class="btn btn-default">Edit</a>
                                            <a href=""
                                               data-url="{{route('products.delete',['id' => $product -> id])}}"
                                               class="btn btn-danger act-del action_delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-12">
                        {{$products->links()}}
                    </div>

                </div>
            </div>
            </div>

    </section>
@endsection
