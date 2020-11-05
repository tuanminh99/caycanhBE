@extends('layouts.admin')

@section('title')
    <title>Sửa sản phẩm</title>
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
                        <h1 class="m-0 text-dark">Sửa sản phẩm</h1>
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

                        <form action="{{route('products.update',['id'=> $product -> id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    value="{{$product->name}}"
                                    placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="price"
                                    value="{{$product->price}}"
                                    placeholder="Nhập giá sản phẩm">
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="stock"
                                    value="{{$product->stock}}"
                                    placeholder="Nhập số lượng">
                            </div>
                            <div class="form-group">
                                <label>Ảnh</label>
                                <input
                                    type="file"
                                    class="form-control-file"
                                    name="feature_image_path">
                                <div class="col-md-12 container_image">
                                    <div class="row">
                                        <img class="image_product" src="{{$product->feature_image_path}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <input
                                    type="file"
                                    multiple
                                    class="form-control-file"
                                    name="image_path[]">
                                <div class="col-md-12 container_image_detail">
                                    <div class="row">
                                        @foreach($product->productImages as $productImageItem)
                                        <div class="col-md-3">
                                            <img class="detail_images" src="{{$productImageItem->image_path}}" alt="">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>

                                <textarea name="description" class="form-control" id="editor1"  rows="8">{{$product->description}}</textarea>

                            </div>

                            <div class="form-group">
                                <label>Nội dung</label>

                                <textarea name="contents" class="form-control" id="editor2"  rows="8">{{$product->content}}</textarea>

                            </div>

                            <div class="form-group">
                                <label>Chọn danh mục cha</label>
                                <select
                                    class="form-control"
                                    name="category_id"
                                >
                                    <option value="0">...</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <div>
                                <label>Tags</label>
                                <select name="tags[]" class="form-control tag-select2" multiple="multiple">
                                    @foreach($product->tags as $tagItem)
                                        <option value="{{$tagItem->name}}"selected>{{$tagItem->name}}</option>
                                    @endforeach
                                </select>
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
