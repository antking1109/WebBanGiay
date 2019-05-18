<?php $__env->startSection('title','Thêm sản phẩm'); ?>
<?php $__env->startSection('contentHeader'); ?>
    <h1>
        Thêm
        <small> Sản phẩm</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo e(route('product.index')); ?>"> Sản phẩm</a></li>
        <li class="active">Thêm sản phẩm</li>
    </ol>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <script>
            Swal.fire({
                position: 'center',
                type: 'success',
                title: '<?php echo e(session('success')); ?>',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
                <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <b>Lỗi!! Bạn vui vòng kiểm tra lại:</b>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-body">
                <form role="form" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                         <input type="text" class="form-control" placeholder="Nhập tên sản phẩm..." name="txtName" value="<?php echo e(old('txtName')); ?>">
                    </div>
                    <div class="form-group">
                        <label>Mô tả sản phẩm</label>
                        <textarea id="addProduct" name="txtDescription" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo e(old('txtDescription')); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Thương hiệu</label>
                         <input type="text" class="form-control" placeholder="Nhập tên thương hiệu..." name="txtTrademark" value="<?php echo e(old('txtTrademark')); ?>">
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                         <input type="text" class="form-control" placeholder="Nhập giá sản phẩm..." name="txtPrice" value="<?php echo e(old('txtPrice')); ?>">
                    </div>
                    <div class="form-group">
                        <label>Giá khuyến mãi: Nhập bằng giá ở trên nếu không có khuyến mãi</label>
                         <input type="text" class="form-control" placeholder="Nhập giá khuyến mãi sản phẩm..." name="txtPromotionPrice" value="<?php echo e(old('txtPromotionPrice')); ?>">
                    </div>
                    <div class="form-group">
                        <label>Loại sản phẩm</label>
                        <select class="form-control" name='ddlProductType'>
                            <?php $__currentLoopData = $product_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($product_type->id); ?>"><?php echo e($product_type->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    ##parent-placeholder-cb5346a081dcf654061b7f897ea14d9b43140712##
    <script type="text/javascript">
            $(function () {
                $('#addProduct').wysihtml5()
            })
        </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>