<?php $__env->startSection('title'); ?>
    Danh sách ảnh của sản phẩm <?php echo e($product['title']); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentHeader'); ?>
    <h1>
        Danh Sách
        <small>Ảnh của sản phẩm <?php echo e($product['title']); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo e(route('product.index')); ?>"> Sản Phẩm</a></li>
        <li class="active">Ảnh Sản phẩm <?php echo e($product['title']); ?></li>
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
            <a href="<?php echo e(route('product_image.add', $product['id'])); ?>"><button type="button" class="btn btn-block btn-success">Thêm ảnh sản phẩm</button></a>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách ảnh của sản phẩm <?php echo e($product['title']); ?></h3>
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
                        <?php $__currentLoopData = $product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($product_image->id); ?></td>
                                <td><?php echo e($product_image->title); ?></td>
                                <td><?php echo e($product_image->alt); ?></td>
                                <td><img src="<?php echo e(URL::asset($product_image->slug)); ?>" width="250px" height="150px"/></td>
                                <td>
                                    <a href="<?php echo e(route('product_image.show', $product_image->id)); ?>">
                                        <button type="button" class="btn btn-block btn-warning btn-xs">Sửa</button>
                                    </a>
                                    <a href="<?php echo e(route('product_image.destroy', $product_image->id)); ?>" onclick="return confirm('Bạn có muốn xóa không?')">
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
            $('#tblImage').DataTable({
                "order": [[ 0, "desc" ]],
                "columnDefs": [{
                    "orderable": false, "targets": 4
                }]
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>