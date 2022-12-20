
<?php $__env->startSection('home','active'); ?>
<?php $__env->startSection('content'); ?>

<body>
    <div class="container">
        <?php if(!empty($successMsg)): ?>
        <div class="alert alert-success"> <?php echo e($successMsg); ?></div>
        <?php endif; ?>
        <div class="container">
            <h3>Welcome to Pendaftaran CPNS 2022</h3>
            <div class="text-center">
                <img src="../foto/colorful simple world humanitarian day facebook post.png" alt="" width="400px">
            </div>
        </div><br><br>
        <div class="container text-center">
            <?php if(auth()->guard()->guest()): ?>
            <a class="btn btn-warning" href="<?php echo e(route('login')); ?>">Login</a>
            <?php endif; ?>
            <?php if(auth()->guard()->check()): ?>
            <a class="btn btn-warning" href="<?php echo e(route('logout')); ?>">Logout</a>
            <?php endif; ?>
        </div>        
        <br>
    </div>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kartu_ujian\resources\views/users/index.blade.php ENDPATH**/ ?>