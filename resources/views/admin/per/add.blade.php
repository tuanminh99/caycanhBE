@extends('layouts.admin')

@section('title')
    <title>Thêm Permission</title>
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

    </script>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="modal-header">
            <h4 class="modal-title">Thêm permission</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <form method="post" action="{{route('per.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên permission</label>
                    <input name="name" placeholder="Nhập tên permission" type=text" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <input name="des" placeholder="Nhập tên permission" type=text" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Key code</label>
                    <input name="key_code" placeholder="Nhập tên permission" type=text" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Danh mục cha</label>
                    <select name="parent_id" class="form-control select-cate">

                        <option value="0">Đây là danh mục cha</option>
                        @foreach($perAll as $per)
                            <option value="{{$per->id}}">{{$per->name}}</option>
                        @endforeach
                    </select>
                </div>
                <input class="select-action" type="hidden" name="action">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <!-- /.content -->
    </div>
@endsection


