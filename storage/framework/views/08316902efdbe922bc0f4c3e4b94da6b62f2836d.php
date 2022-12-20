
<?php $__env->startSection('login','active'); ?>
<?php $__env->startSection('content'); ?>
<div class="container col-md-9">
    <?php if(session('success')): ?>
    <p class="alert alert-success"><?php echo e(session('success')); ?></p>
    <?php endif; ?>
    <?php if(session('danger')): ?>
    <p class="alert alert-danger"><?php echo e(session('danger')); ?></p>
    <?php endif; ?>
    <?php if($errors->any()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p class="alert alert-danger"><?php echo e($err); ?></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <h3>Welcome User</h3>
    <div class="row">
        <div class="col-md-6">
            <img src="../foto/colorful simple world humanitarian day facebook post.png" alt="" width="400px">
        </div>
        <div class="card col-md-6"><br>
            <form action="<?php echo e(route('login.action')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label>Email <span class="text-danger">*</span></label>
                    <input class="form-control" required type="email" name="email" value="<?php echo e(old('email')); ?>" />
                </div>
                <div class="mb-3">
                    <label>Password <span class="text-danger">*</span></label>
                    <input class="form-control" required type="password" name="password" />
                </div>
                <div class="mb-3 text-center">
                    <button class="btn btn-primary">Login</button>
                    <button class="btn btn-danger" type="reset">Clear</button>
                </div>
                <p align="center">Not a user? <a href="<?php echo e(URL::to('register')); ?>">Register Here</a></p>
            </form>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kartu_ujian\resources\views/users/login.blade.php ENDPATH**/ ?>