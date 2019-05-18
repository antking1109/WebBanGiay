<?php $__env->startSection('title','Thêm chi tiết sản phẩm'); ?>
<?php $__env->startSection('contentHeader'); ?>
    <h1>
        Thêm
        <small> Chi Tiết Sản phẩm</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo e(route('product.index')); ?>"> Sản phẩm</a></li>
        <li><a href="<?php echo e(route('product_detail.index',$product['id'])); ?>"> <?php echo e($product['title']); ?></a></li>
        <li class="active">Thêm chi tiết sản phẩm</li>
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
                        <label>Chọn size</label>
                        <select class="form-control" name="txtSize">
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Màu</label>
                            <input type="text" class="form-control" placeholder="Nhập màu sắc..." name="txtColor" value="<?php echo e(old('txtColor')); ?>">
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                         <input type="number" class="form-control" placeholder="Số lượng..." name="txtQuantity" value="<?php echo e(old('txtQuantity')); ?>">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>