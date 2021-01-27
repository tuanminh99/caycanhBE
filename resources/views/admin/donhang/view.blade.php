@extends('layouts.admin')

@section('title')
    <title>Đơn hàng chi tiết</title>
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
                        <h1 class="m-0 text-dark">Đơn hàng chi tiết</h1>
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
                        <strong>Thông tin tài khoản</strong>
                        <table class="table table-light">
                            <thead>
                            <tr>
                                <th scope="col">Tên tài khoản</th>
                                <th scope="col">SĐT</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order_by_id as $order)
                                <tr>
                                    <td scope="row">{{$order->customer_name}}</td>
                                    <td>{{$order->customer_phone}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table><br/>
                        <strong>Thông tin vận chuyển</strong>
                        <table class="table table-light">
                            <thead>
                            <tr>
                                <th scope="col">Tên người mua</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">SĐT</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order_by_id as $order)
                            <tr>
                                <td scope="row">{{$order->shipping_name}}</td>
                                <td scope="row">{{$order->shipping_address}}</td>
                                <td>{{$order->shipping_phone}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table><br/>
                        <strong>Thông tin chi tiết</strong>
                        <table class="table table-light">
                            <thead>
                            <tr>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">giá</th>
                                <th scope="col">Tổng tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order_by_id as $order)
                            <tr>
                                <td scope="row">{{$order->product_name}}</td>
                                <td>{{$order->product_quantity}}</td>
                                <td>{{number_format($order->product_price)}}đ</td>
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


