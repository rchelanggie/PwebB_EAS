
<?php $__env->startSection('content'); ?>

<body>
    <div class="container">
        <?php if(!empty($successMsg)): ?>
        <div class="alert alert-success"> <?php echo e($successMsg); ?></div>
        <?php endif; ?>
        <?php if(auth()->guard()->check()): ?>
        <h5>Welcome <b><?php echo e(Auth::user()->username); ?></b></h5>
        <?php endif; ?>
        <?php if(!empty($data)): ?>
        <div class="container col-md-9"><br><br>
            <a class="btn btn-primary" target="_blank" href="<?php echo e(URL::to('createPDF')); ?>">Export to PDF</a><br><br>
            <table class="table table-border">
                <tr>
                    <td>Lokasi</td>
                    <td><?php echo e($data->nama_lokasi); ?></td>
                    <td rowspan="3"><img src="../foto/<?php echo e($data->foto); ?>" alt="" width="300px"></td>
                </tr>
                <tr>
                    <td>Instansi</td>
                    <td><?php echo e($data->nama_posisi); ?></td>
                </tr>
                <tr>
                    <td>No. Identitas</td>
                    <td><?php echo e($data->nik); ?></td>
                </tr>
                <tr>
                    <td>No. Peserta</td>
                    <td><?php echo e($data->id_kartu); ?></td>
                </tr>
                <tr>
                    <td>Nama Peserta</td>
                    <td><?php echo e($data->nama); ?></td>
                </tr>
                <tr>
                    <td>Tempat/Tanggal Lahir</td>
                    <td><?php echo e($data->tempat_lahir); ?>/<?php echo e(date('Y-m-d', strtotime($data->tanggal_lahir))); ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><?php echo e($data->jenis_kelamin); ?></td>
                </tr>
                <tr>
                    <td>Pendidikan</td>
                    <td><?php echo e($data->pendidikan); ?></td>
                </tr>
            </table>
        </div><br><br>
        <?php endif; ?>
    </div>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kartu_ujian\resources\views/users/kartu_ujian.blade.php ENDPATH**/ ?>