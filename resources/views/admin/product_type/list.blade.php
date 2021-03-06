@extends('layouts.admin')
@section('title','Danh sách loại sản phẩm')
@section('contentHeader')
    <h1>
        Danh Sách
        <small>Loại Sản Phẩm</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Loại sản phẩm</li>
    </ol>
@endsection
@section('content')
    @if (session('message'))
        <script>
            Swal.fire({
                position: 'center',
                type: 'success',
                title: '{{session('message')}}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    @if (session('add-success'))
        <script>
            Swal.fire({
                position: 'center',
                type: 'success',
                title: '{{session('add-success')}}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    <div class="row">
        <div class="col-xs-3">
            <a href="{{ route('product_type.create') }}"><button type="button" class="btn btn-block btn-success">Thêm loại sản phẩm</button></a>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách loại sản phẩm</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="productTypeTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Đường dẫn</th>
                                <th>Ảnh mô tả</th>
                                <th>Ngày tạo</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product_types as $product_type)
                                <tr>
                                    <td>{{ $product_type->title }}</td>
                                    <td>{{ $product_type->slug }}</td>
                                    <td><img src="{{$product_type['slug_image']}}" width="150px"/></td>
                                    <td>{{ $product_type->created_at }}</td>
                                    <td>
                                        <a href="{{ route('product_type.edit', $product_type->id) }}">
                                            <button type="button" class="btn btn-block btn-warning btn-xs">Sửa</button>
                                        </a>
                                        <a href="{{ route('product_type.destroy', $product_type->id) }}" onclick="return confirm('Bạn có muốn xóa không?')">
                                            <button type="button" class="btn btn-block btn-danger btn-xs">Xóa</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection
@section('script')
    <!-- jQuery 3 -->
    <script src="{{URL::asset('src_admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{URL::asset('src_admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{URL::asset('src_admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('src_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{URL::asset('src_admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{URL::asset('src_admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{URL::asset('src_admin/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{URL::asset('src_admin/dist/js/demo.js')}}"></script>
    <!-- page script -->
    <script>
    $(function () {
        $('#productTypeTable').DataTable({
            "order": [[ 3, "desc" ]],
            "columnDefs": [{
                "orderable": false, "targets": 4
            }]
        })
    })
    </script>
@endsection
