@extends('layouts.admin')
@section('title')
    Danh sách ảnh của sản phẩm {{$product['title']}}
@endsection
@section('contentHeader')
    <h1>
        Danh Sách
        <small>Ảnh của sản phẩm {{$product['title']}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('product.index')}}"> Sản Phẩm</a></li>
        <li class="active">Ảnh Sản phẩm {{$product['title']}}</li>
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
            <a href="{{ route('product_image.add', $product['id']) }}"><button type="button" class="btn btn-block btn-success">Thêm ảnh sản phẩm</button></a>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách ảnh của sản phẩm {{$product['title']}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tblImage" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tiêu </th>
                            <th>Mô tả</th>
                            <th>Thumb</th>
                            <th>Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($product_images as $product_image)
                            <tr>
                                <td>{{ $product_image->id }}</td>
                                <td>{{ $product_image->title }}</td>
                                <td>{{ $product_image->alt }}</td>
                                <td><img src="{{URL::asset($product_image->slug)}}" width="250px" height="150px"/></td>
                                <td>
{{--                                    <a href="{{ route('product_detail.show', $product_detail->id) }}">--}}
{{--                                        <button type="button" class="btn btn-block btn-warning btn-xs">Sửa</button>--}}
{{--                                    </a>--}}
{{--                                    <a href="{{ route('product_detail.destroy', $product_detail->id) }}" onclick="return confirm('Bạn có muốn xóa không?')">--}}
{{--                                        <button type="button" class="btn btn-block btn-danger btn-xs">Xóa</button>--}}
{{--                                    </a>--}}
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
            $('#tblImage').DataTable({
                "order": [[ 0, "desc" ]],
                "columnDefs": [{
                    "orderable": false, "targets": 4
                }]
            })
        })
    </script>
@endsection
