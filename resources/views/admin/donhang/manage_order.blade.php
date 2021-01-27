@extends('layouts.admin')

@section('title')
    <title>Liệt kê đơn hàng</title>
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
                        <h1 class="m-0 text-dark">Liệt kê đơn hàng</h1>
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
                        <table class="table table-light">
                            <thead>
                            <tr>
                                <th scope="col">Tên tài khoản</th>
                                <th scope="col">Tổng giá</th>
                                <th scope="col">Tình trạng</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($all_orders as $id => $order)

                                <tr>
                                    <td scope="row">{{$order->customer_name}}</td>
                                    <td>{{number_format($order->order_total)}}đ</td>
                                    <td>{{$order->order_status}}</td>
                                    <td>
                                        <a href="{{route('orders.view',['id'=>$order->order_id])}}" class="btn btn-default">View</a>
                                        <a href=""
                                           data-url=""
                                           class="btn btn-danger act-del action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
{{--                        {{$all_orders->links()}}--}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection


