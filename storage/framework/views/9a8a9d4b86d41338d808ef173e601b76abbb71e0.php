
<?php $__env->startSection('data_lokasi','active'); ?>
<?php $__env->startSection('content'); ?>

<body>
    <div class="container">
        <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
        <?php endif; ?>
        <?php if(auth()->guard()->check()): ?>
        <h5>Welcome <b><?php echo e(Auth::user()->username); ?></b></h5><br>
        <a href="<?php echo e(route('data_lokasi.create')); ?>" class="btn btn-warning">Create Data</a><br><br>
        <div class="container col-md-9"><br>            
            <table class="table">
                <tr>
                    <th>Nama Lokasi</th>
                    <th>Action</th>
                </tr>
                <?php $__currentLoopData = $lokasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lokasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($lokasi->nama_lokasi); ?></td>
                    <td>
                        <a href="<?php echo e(route('data_lokasi.show', $lokasi->id_lokasi)); ?>" class="btn btn-primary">View</a>                       
                        <?php echo e(Form::open(array('route' => array('data_lokasi.destroy', $lokasi->id_lokasi), 'method' => 'delete'))); ?>

                        <button type="submit" class="btn btn-danger">Delete</button>
                        <?php echo e(Form::close()); ?>

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
        
        <?php endif; ?>
    </div>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kartu_ujian\resources\views/admin/lokasi.blade.php ENDPATH**/ ?>