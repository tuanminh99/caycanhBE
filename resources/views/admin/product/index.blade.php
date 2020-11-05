@extends('layouts.admin')

@section('title')
    <title>Sản phẩm</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('adminAdd/product/index/list.css')}}">
@endsection

@section('js')
    <script src="{{asset('vendors/sweetAlert2/sweetalert2@10.js')}}"></script>
    <script src="{{asset('adminAdd/main.js')}}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Sản phẩm</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a style="float: right" href="{{route('products.create')}}" class="btn btn-success pull-right m-2">Add</a>
                    </div>
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

                    <div class="col-md-12">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection


