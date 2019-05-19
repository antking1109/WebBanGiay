<?php $__env->startSection('title','Danh sách loại sản phẩm'); ?>
<?php $__env->startSection('contentHeader'); ?>
    <h1>
        Danh Sách
        <small>Loại Sản Phẩm</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Loại sản phẩm</li>
    </ol>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(session('message')): ?>
        <script>
            Swal.fire({
                position: 'center',
                type: 'success',
                title: '<?php echo e(session('message')); ?>',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php endif; ?>
    <?php if(session('add-success')): ?>
        <script>
            Swal.fire({
                position: 'center',
                type: 'success',
                title: '<?php echo e(session('add-success')); ?>',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php endif; ?>
    <div class="row">
        <div class="col-xs-3">
            <a href="<?php echo e(route('product.add')); ?>"><button type="button" class="btn btn-block btn-success">Thêm loại sản phẩm</button></a>
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
                                <th>Ngày tạo</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $product_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($product_type->title); ?></td>
                                    <td><?php echo e($product_type->slug); ?></td>
                                    <td><?php echo e($product_type->created_at); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('product_type.edit', $product_type->id)); ?>">
                                            <button type="button" class="btn btn-block btn-warning btn-xs">Sửa</button>
                                        </a>
                                        <a href="<?php echo e(route('product_type.destroy', $product_type->id)); ?>" onclick="return confirm('Bạn có muốn xóa không?')">
                                            <button type="button" class="btn btn-block btn-danger btn-xs">Xóa</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- jQuery 3 -->
    <script src="<?php echo e(URL::asset('src_admin/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo e(URL::asset('src_admin/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <!-- DataTables -->
    <script src="<?php echo e(URL::asset('src_admin/bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('src_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
    <!-- SlimScroll -->
    <script src="<?php echo e(URL::asset('src_admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo e(URL::asset('src_admin/bower_components/fastclick/lib/fastclick.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(URL::asset('src_admin/dist/js/adminlte.min.js')); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo e(URL::asset('src_admin/dist/js/demo.js')); ?>"></script>
    <!-- page script -->
    <script>
    $(function () {
        $('#productTypeTable').DataTable({
            "order": [[ 2, "desc" ]],
            "columnDefs": [{
                "orderable": false, "targets": 3 
            }]
        })
    })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>