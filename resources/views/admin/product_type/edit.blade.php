@extends('layouts.admin')
@section('title','Sửa loại sản phẩm')
@section('contentHeader')
    <h1>
        Sửa
        <small>Loại sản phẩm</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('product_type.show') }}"> Loại sản phẩm</a></li>
        <li class="active">Sửa loại sản phẩm</li>
    </ol>
@endsection
@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                position: 'center',
                type: 'success',
                title: '{{session('success')}}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    <div class="row">
        <div class="col-md-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <b>Lỗi!! Bạn vui vòng kiểm tra lại:</b>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-body">
                <form role="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <img src="{{$product_type['slug_image']}}" width="200px"/>
                    <div class="form-group">
                        <label for="exampleInputFile">Chọn ảnh mô tả</label>
                        <input type="file" id="fileImage" name="fileImage">

                        <p class="help-block">Chọn ảnh nếu muốn thay đổi.</p>
                    </div>
                    <div class="form-group">
                        <label>Tên loại sản phẩm</label>
                         <input type="text" class="form-control" placeholder="Nhập tên loại sản phẩm..." name="txtName" value="{{ old('txtName',$product_type['title']) }}">
                    </div>
                    <div class="form-group">
                        <label>Đường dẫn</label>
                        <input type="hidden" name="oldSlug" value="{{ old('oldSlug', $product_type['slug'])}}">
                        <input type="text" class="form-control" placeholder="Nhập đường dẫn..." name="txtSlug" value="{{ old('txtSlug', $product_type['slug']) }}">
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @parent
@endsection
