<?php $__env->startSection('title'); ?>
    Danh sách sản phẩm của <?php echo e($product['title']); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentHeader'); ?>
    <h1>
        Danh Sách
        <small>Sản phẩm <?php echo e($product['title']); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo e(route('product.index')); ?>"> Sản Phẩm</a></li>
        <li class="active">Sản phẩm <?php echo e($product['title']); ?></li>
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
            <a href="<?php echo e(route('product_detail.add', $product['id'])); ?>"><button type="button" class="btn btn-block btn-success">Thêm chi tiết sản phẩm</button></a>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách sản phẩm của <?php echo e($product['title']); ?></h3>
                    <hr>
                    <div>
                        <?php $__currentLoopData = $product->images->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img src="<?php echo e($product_image['slug']); ?>" width="250px" title="<?php echo e($product_image['title']); ?>" alt="<?php echo e($product_image['alt']); ?>"/>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <hr>
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
                            <?php $__currentLoopData = $product_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($product_detail->id); ?></td>
                                    <td><?php echo e($product_detail->size); ?></td>
                                    <td><?php echo e($product_detail->color); ?></td>
                                    <td><?php echo e($product_detail->quantity); ?></td>
                                    <td><?php echo e($product_detail->created_at); ?></td>
                                    <td><?php echo e($product_detail->updated_at); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('product_detail.show', $product_detail->id)); ?>">
                                            <button type="button" class="btn btn-block btn-warning btn-xs">Sửa</button>
                                        </a>
                                        <a href="<?php echo e(route('product_detail.destroy', $product_detail->id)); ?>" onclick="return confirm('Bạn có muốn xóa không?')">
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
        $('#productTable').DataTable({
            "order": [[ 4, "desc" ]],
            "columnDefs": [{
                "orderable": false, "targets": 6 
            }]
        })
    })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>