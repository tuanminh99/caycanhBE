@extends('layouts.admin')

@section('title')
    <title>Permission</title>
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
                        <h1 class="m-0 text-dark">Permission</h1>
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
                        <a style="float: right" href="{{route('per.create')}}" class="btn btn-success pull-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Mô tả</th>
                                <th>Key code</th>
                                <th>Danh mục lớn</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach($pers as $value)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->des}}</td>
                                    <td>{{$value->key_code}}</td>
                                    @if($value->parentPer == null)
                                        <td>Đây là danh mục cha</td>
                                    @else
                                        <td>{{$value->parentPer->name}}</td>
                                    @endif
                                    <td style="text-align: center;" width="20%">
                                        <a  href="{{route('per.edit',['id'=>$value->id])}}" class="btn btn-danger pull-right m-2">Edit</a>
                                        <a href=""
                                           data-url="{{route('per.delete',['id'=>$value->id])}}"
                                           class="btn btn-danger act-del action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        {{$pers->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection
