<?php $__env->startSection('title','Danh sách sản phẩm'); ?>
<?php $__env->startSection('contentHeader'); ?>
    <h1>
        Danh Sách
        <small>Sản Phẩm</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sản phẩm</li>
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
            <a href="<?php echo e(route('product.add')); ?>"><button type="button" class="btn btn-block btn-success">Thêm sản phẩm</button></a>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách sản phẩm</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="productTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Ảnh</th>
                                <th>Mô tả</th>
                                <th>Thương hiệu</th>
                                <th>Giá</th>
                                <th>Giá khuyến mãi</th>
                                <th>Loại</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($product->title); ?></td>
                                    <td><img src="<?php echo e($product->images->first()['slug']); ?>" width="150px" title="<?php echo e($product->images->first()['title']); ?>" alt="<?php echo e($product->images->first()['alt']); ?>"/> </td>
                                    <td><?php echo mb_substr(strip_tags($product->description),0,250); ?></td>
                                    <td><?php echo e($product->trademark); ?></td>
                                    <td><?php echo e($product->price); ?></td>
                                    <td><?php echo e($product->promotion_price); ?></td>
                                    <td><?php echo e($product->productType->title); ?></td>
                                    <td><?php echo e($product->created_at); ?></td>
                                    <td><?php echo e($product->updated_at); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('product.show', $product->id)); ?>">
                                            <button type="button" class="btn btn-block btn-warning btn-xs"><b>Sửa</b></button>
                                        </a>
                                        <a href="<?php echo e(route('product.destroy', $product->id)); ?>" onclick="return confirm('Bạn có muốn xóa không?')">
                                            <button type="button" class="btn btn-block btn-danger btn-xs"><b>Xóa</b></button>
                                        </a>
                                        <a href="<?php echo e(route('product_detail.index', $product->id)); ?>">
                                            <button type="button" class="btn btn-block btn-success btn-xs"><b>Chi tiết sản phẩm</b></button>
                                        </a>
                                        <a href="<?php echo e(route('product_image.index', $product->id)); ?>">
                                            <button type="button" class="btn btn-block btn-success btn-xs"><b>Quản lý ảnh</b></button>
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
            "order": [[ 7, "desc" ]],
            "columnDefs": [{
                "orderable": false, "targets": 9 
            }]
        })
    })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>