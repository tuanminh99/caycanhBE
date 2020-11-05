@extends('layouts.admin')

@section('title')
    <title>Thêm sản phẩm</title>
@endsection

@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('adminAdd/product/add/add.css')}}" rel="stylesheet" />

@endsection

@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('adminAdd/product/add/add.js')}}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'editor1', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        } );

        CKEDITOR.replace( 'editor2', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        } );
    </script>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Thêm sản phẩm</h1>
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
            <div class="col-md-12">
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
{{--                                    value="{{old('name')}}"--}}
                                    placeholder="Nhập tên danh mục">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input
                                    type="text"
                                    class="form-control @error('price') is-invalid @enderror"
                                    name="price"
{{--                                    value="{{old('price')}}"--}}
                                    placeholder="Nhập giá sản phẩm">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input
                                    type="number"
                                    class="form-control @error('stock') is-invalid @enderror"
                                    name="stock"
{{--                                    value="{{old('stock')}}"--}}
                                    placeholder="Nhập số lượng">
                                @error('stock')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ảnh</label>
                                <input
                                    type="file"
                                    class="form-control-file"
                                    name="feature_image_path">
                            </div>
                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <input
                                    type="file"
                                    multiple
                                    class="form-control-file"
                                    name="image_path[]">
                            </div>
                            <div class="form-group">
                                <label>Chọn danh mục cha</label>
                                <select
                                    class="form-control @error('category_id') is-invalid @enderror"
                                    name="category_id"
{{--                                    value="{{old('name')}}"--}}
                                >
                                    <option value="">Chọn danh mục</option>
                                    {!! $htmlOption !!}
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label>Tags</label>
                                <select
                                    name="tags[]"
                                    class="form-control tag-select2 @error('tags') is-invalid @enderror"
                                    multiple="multiple">
                                </select>
                                @error('tags')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea
                                    name="description"
                                    class="form-control"
{{--                                    @error('description') is-invalid @enderror"--}}
                                    id="editor1"
{{--                                    value="{{old('description')}}"--}}
                                    rows="8">
                                </textarea>
{{--                                @error('description')--}}
{{--                                <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                                @enderror--}}
                            </div>

                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea
                                    name="contents"
                                    class="form-control"
{{--                                    @error('contents') is-invalid @enderror"--}}
                                    id="editor2"
                                    {{--value="{{old('description')}}"--}}
                                    rows="8">
                                </textarea>
{{--                                @error('contents')--}}
{{--                                <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                                @enderror--}}
                            </div>
{{--
{{--                            <div class="form-group">--}}
{{--                                <label>Category id</label>--}}
{{--                                <select--}}
{{--                                    class="form-control"--}}
{{--                                    name="category_id"--}}
{{--                                >--}}
{{--                                    @foreach($data2 as $data)--}}
{{--                                        <option value="{{$data->id}}">{{$data->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.content -->
    </div>
@endsection
