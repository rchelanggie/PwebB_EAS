
<?php $__env->startSection('data_diri','active'); ?>
<?php $__env->startSection('content'); ?>

<body>
    <div class="container">
        <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
        <?php endif; ?>
        <?php if(auth()->guard()->check()): ?>
        <h5>Welcome <b><?php echo e(Auth::user()->username); ?></b></h5>
        <div class="container col-md-9"><br>            
            <table class="table">
                <tr>
                    <th>Nama Peserta</th>
                    <th>NIK Peserta</th>
                    <th>Status Peserta</th>
                    <th>Pendidikan Peserta</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($data->nama); ?></td>
                    <td><?php echo e($data->nik); ?></td>
                    <td><?php echo e($data->status_pendaftaran); ?></td>
                    <td><?php echo e($data->pendidikan); ?></td>
                    <td><?php echo e($data->created_at); ?></td>
                    <td>
                        <a href="<?php echo e(route('data_diri.show', $data->id_user)); ?>" class="btn btn-primary">View</a>                    
                        <?php echo e(Form::open(array('route' => array('data_diri.destroy', $data->id_user), 'method' => 'delete'))); ?>

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
<?php echo $__env->make('admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kartu_ujian\resources\views/admin/data_diri.blade.php ENDPATH**/ ?>