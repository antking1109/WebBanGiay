@extends('layouts.admin')
@section('title','Thêm sản phẩm')
@section('contentHeader')
    <h1>
        Thêm
        <small> Sản phẩm</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('product.index') }}"> Sản phẩm</a></li>
        <li class="active">Thêm sản phẩm</li>
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
                <form role="form" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                         <input type="text" class="form-control" placeholder="Nhập tên sản phẩm..." name="txtName" value="{{ old('txtName') }}">
                    </div>
                    <div class="form-group">
                        <textarea id="some-textarea" placeholder="Enter text ..."></textarea>
                        <script type="text/javascript">
                            $('#some-textarea').wysihtml5();
                        </script>
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