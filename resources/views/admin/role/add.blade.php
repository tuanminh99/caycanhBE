@extends('layouts.admin')

@section('title')
    <title>Thêm Role</title>
@endsection
@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('adminAdd/product/add/add.js')}}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        $('.checkbox_parent').on('click', function (){
            $(this).parents('.card').find('.checkbox_children').prop('checked', $(this).prop('checked'));
        })
        $('.check-all').on('click', function (){
            $('.checkbox_parent').prop('checked', $(this).prop('checked'));
            $('.checkbox_children').prop('checked', $(this).prop('checked'));
        })
        $('.checkbox_children').on('click', function (){
            var total = $(this).parents('.card').find('.row .card-body').length;
            var checked = $(this).parents('.card').find('.checkbox_children:checked').length;

            if (total == checked){
                $(this).parents('.card').find('.checkbox_parent').prop('checked', 'checked');
            }
            else {
                $(this).parents('.card').find('.checkbox_parent').prop('checked', '');
            }
        })
    </script>
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
            <h4 class="modal-title">Thêm Role</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{route('role.add')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label>Tên role</label>
                    <input name="name" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <input name="des" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Người tạo</label>
                    <input type="text" class="form-control" disabled value="{{auth()->user()->name}}"/>
                </div>
                <label><input class="check-all" type="checkbox"></label>
                check all
                @foreach($parentPermission as $permission)
                    <div class="card col-md-12">
                        <div class="card-body" style="background-color: #18c3e2">
                            <h5 class="card-title">
                                <label><input class="checkbox_parent" type="checkbox" value="{{$permission->id}}"></label>
                                {{$permission->name}}

                            </h5>
                        </div>
                        <hr>

                        <div class="row">
                            @foreach($permission->PermissionChildren()->get() as $child)
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <label><input class="checkbox_children" name="permission_id[]" type="checkbox" value="{{$child->id}}"></label>
                                        {{$child->name}}
                                    </h5>
                                </div>
                            @endforeach
                        </div>

                    </div>
                @endforeach
                <input type="submit" class="btn btn-primary" value="Submit"/>
            </form>
        </div>

        <!-- /.content -->
    </div>
@endsection


