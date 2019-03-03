@extends('layouts.admin')
@section('title','Danh sách thành viên')
@section('contentHeader')
    <h1>
        Danh Sách
        <small>Thành Viên</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Thành viên</li>
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
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách người dùng</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="userTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Ngày tạo</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <a href="{{ route('user.getUserByID', $user->id) }}">
                                            <button type="button" class="btn btn-block btn-warning btn-xs">Sửa</button>
                                        </a>
                                        <a href="{{ route('user.delete', $user->id) }}" onclick="return confirm('Bạn có muốn xóa không?')">
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
        $('#userTable').DataTable({
            "order": [[ 2, "desc" ]],
            "columnDefs": [{
                "orderable": false, "targets": 3 
            }]
        })
    })
    </script>
@endsection