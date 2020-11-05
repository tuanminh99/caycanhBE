@extends('layouts.admin')

@section('title')
    <title>Giới thiệu</title>
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
                        <h1 class="m-0 text-dark">Giới thiệu</h1>
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
                        <a style="float: right" href="{{route('intros.create')}}" class="btn btn-success pull-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-light">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($intros as $intro)

                                <tr>
                                    <th scope="row">{{$intro->id}}</th>
                                    <td width="80%">{!! $intro->contents !!}</td>
                                    <td>
                                        <a href="{{route('intros.edit',['id'=>$intro->id])}}" class="btn btn-default">Edit</a>
                                        <a href=""
                                           data-url="{{route('intros.delete',['id'=>$intro->id])}}"
                                           class="btn btn-danger act-del action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        {{$intros->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection
