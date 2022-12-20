
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
        <h5>Welcome <b><?php echo e(Auth::user()->username); ?></b></h5>
        <!-- data diri -->
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#data_lokasi" role="button" aria-expanded="false" aria-controls="data_lokasi">
                Data Lokasi
            </a>
        </p>
        <div class="collapse" id="data_lokasi">
            <div class="card card-body">
                <form action="<?php echo e(route('data_lokasi.update', $data->id_lokasi)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="card"><br>
                        <div class="row col-md-12">
                            <div class="col-md-2">
                                <label for="nama_lokasi">Nama Lokasi</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="nama_lokasi" id="nama_lokasi" class="form-control" value="<?php echo e($data->nama_lokasi); ?>">
                            </div>
                        </div><br> 
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="reset" class="btn btn-danger">Clear</button>
                        </div><br><br>
                    </div>
                </form>
            </div>
        </div><br>
        
        <?php endif; ?>
    </div>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kartu_ujian\resources\views/admin/data_lokasi.blade.php ENDPATH**/ ?>