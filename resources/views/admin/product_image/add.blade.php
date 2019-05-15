@extends('layouts.admin')
@section('title','Thêm ảnh sản phẩm')
@section('contentHeader')
    <h1>
        Thêm
        <small> Ảnh Sản Phẩm</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('product.index') }}"> Sản phẩm</a></li>
        <li><a href="{{ route('product_detail.index',$product['id'])}}"> {{$product['title']}}</a></li>
        <li class="active">Thêm ảnh sản phẩm</li>
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
                        <div class="form-group">
                            <label for="exampleInputFile">Chọn ảnh</label>
                            <input type="file" id="fileImage" name="fileImage">

                            <p class="help-block">Vui lòng chọn file là hình ảnh.</p>
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" class="form-control" placeholder="Nhập tiêu đề hình ảnh..." name="txtTitle" value="{{ old('txtTitle') }}">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control" rows="3" placeholder="Nhập mô tả hình ảnh ..." name="txtAlt">{{ old('txtAlt') }}</textarea>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Thêm</button>
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
