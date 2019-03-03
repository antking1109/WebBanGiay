@extends('layouts.admin')
@section('title')
    Danh sách sản phẩm của {{$product['title']}}
@endsection
@section('contentHeader')
    <h1>
        Danh Sách
        <small>Sản phẩm {{$product['title']}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('product.index')}}"> Sản Phẩm</a></li>
        <li class="active">Sản phẩm {{$product['title']}}</li>
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
            <a href="{{ route('product_detail.add', $product['id']) }}"><button type="button" class="btn btn-block btn-success">Thêm chi tiết sản phẩm</button></a>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách sản phẩm của {{$product['title']}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="productTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Size</th>
                                <th>Màu</th>
                                <th>Số lượng</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product_details as $product_detail)
                                <tr>
                                    <td>{{ $product_detail->id }}</td>
                                    <td>{{ $product_detail->size }}</td>
                                    <td>{{ $product_detail->color }}</td>
                                    <td>{{ $product_detail->quantity }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>{{ $product->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('product.show', $product->id) }}">
                                            <button type="button" class="btn btn-block btn-warning btn-xs">Sửa</button>
                                        </a>
                                        <a href="{{ route('product.destroy', $product->id) }}" onclick="return confirm('Bạn có muốn xóa không?')">
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
        $('#productTable').DataTable({
            "order": [[ 4, "desc" ]],
            "columnDefs": [{
                "orderable": false, "targets": 6 
            }]
        })
    })
    </script>
@endsection