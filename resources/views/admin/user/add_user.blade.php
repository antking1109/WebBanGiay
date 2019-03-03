@extends('layouts.admin')
@section('title','Thêm thành viên')
@section('contentHeader')
    <h1>
        Thêm
        <small>Thành Viên</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('user.show') }}"> Thành viên</a></li>
        <li class="active">Thêm thành viên</li>
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
                        <label>Tên</label>
                         <input type="text" class="form-control" placeholder="Nhập tên ..." name="txtName" value="{{ old('txtName') }}">
                    </div>
                    <div class="form-group">
                        <label>Email</label><br/>
                        <input type="email" class="form-control" placeholder="Nhập email ..." name="txtEmail" value="{{ old('txtEmail') }}">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" placeholder="Nhập mật khẩu ..." name="txtPass1">
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" placeholder="Nhập lại mật khẩu ..." name="txtPass2">
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