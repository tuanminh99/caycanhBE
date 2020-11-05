@extends('layouts.admin')

@section('title')
    <title>Setting Add</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Setting Add</h1>
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
                    <div class="col-md-6">
                        <form action="{{route('settings.update',['id'=> $setting->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Config key</label>
                                <input
                                    type="text"
                                    class="form-control @error('config_key') is-invalid @enderror"
                                    name="config_key"
                                    value="{{$setting->config_key}}"
                                    placeholder="Nhập config key">
                                @error('config_key')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                                <div class="form-group">
                                    <label>Config value</label>
                                    <input
                                        type="text"
                                        class="form-control @error('config_value') is-invalid @enderror"
                                        name="config_value"
                                        value="{{$setting->config_value}}"
                                        placeholder="Nhập config value">
                                    @error('config_value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.content -->
    </div>
@endsection


