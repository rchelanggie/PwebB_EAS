
<?php $__env->startSection('data_berkas','active'); ?>
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
            <?php if(!empty($data)): ?>
                <?php if($data->status_dokumen != "Verified"): ?>
                <a href="<?php echo e(route('data_berkas.edit', Auth::user()->id)); ?>" class="btn btn-warning">Update Data</a><br><br>
                <?php endif; ?>
            <?php endif; ?>
            <form action="<?php echo e(route('data_berkas.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card"><br>
                    <div class="row col-md-12">
                        <div class="col-md-2">
                            <label for="ijazah">Scan Ijazah</label>
                        </div>
                        <div class="col-md-10">
                            <?php if(!empty($data)): ?>
                            <img src="../foto/<?php echo e($data->ijazah); ?>" alt="" width="300px"><br><br>
                            <?php else: ?>
                            <input type="file" name="ijazah" id="ijazah" class="form-control">
                            <?php endif; ?>
                        </div>
                    </div><br>
                    <div class="row col-md-12">
                        <div class="col-md-2">
                            <label for="ktp">Scan KTP</label>
                        </div>
                        <div class="col-md-10">
                            <?php if(!empty($data)): ?>
                            <img src="../foto/<?php echo e($data->ktp); ?>" alt="" width="300px"><br><br>
                            <?php else: ?>
                            <input type="file" name="ktp" id="ktp" class="form-control">
                            <?php endif; ?>
                        </div>
                    </div><br>
                    <div class="row col-md-12">
                        <div class="col-md-2">
                            <label for="kk">Scan Kartu Keluarga</label>
                        </div>
                        <div class="col-md-10">
                            <?php if(!empty($data)): ?>
                            <img src="../foto/<?php echo e($data->kk); ?>" alt="" width="300px"><br><br>
                            <?php else: ?>
                            <input type="file" name="kk" id="kk" class="form-control">
                            <?php endif; ?>
                        </div>
                    </div><br>
                    <div class="row col-md-12">
                        <div class="col-md-2">
                            <label for="formulir">Formulir Pendaftaran<span class="text-danger"> (.pdf)</span></label>
                        </div>
                        <div class="col-md-10">
                            <?php if(!empty($data)): ?>
                            <a href="<?php echo e(route('dokumen', $data->formulir)); ?>" class="btn btn-secondary"><?php echo e($data->formulir); ?></a>
                            <?php else: ?>
                            <input type="file" name="formulir" id="formulir" class="form-control">
                            <?php endif; ?>
                        </div>
                    </div><br>
                    <div class="text-center">
                        <?php if(empty($data)): ?>
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-danger">Clear</button>
                        <?php else: ?>
                        <a class="btn btn-success" href="#">Status Documents: <?php echo e($data->status_dokumen); ?></a>
                        <?php endif; ?> 
                    </div><br><br>
                </div>
            </form>
        </div>

        <?php endif; ?>
    </div>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kartu_ujian\resources\views/users/data_berkas.blade.php ENDPATH**/ ?>