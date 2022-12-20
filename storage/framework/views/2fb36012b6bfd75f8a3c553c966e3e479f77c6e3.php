
<?php $__env->startSection('data_posisi','active'); ?>
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
            <a class="btn btn-primary" data-toggle="collapse" href="#data_posisi" role="button" aria-expanded="false" aria-controls="data_posisi">
                Data Posisi
            </a>
        </p>
        <div class="collapse" id="data_posisi">
            <div class="card card-body">
                <form action="<?php echo e(route('data_posisi.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card"><br>
                        <div class="row col-md-12">
                            <div class="col-md-2">
                                <label for="nama_posisi">Nama Posisi</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="nama_posisi" id="nama_posisi" class="form-control">
                            </div>
                        </div><br>                        
                        <div class="row col-md-12">
                            <div class="col-md-2">
                                <label for="id_lokasi">Posisi Jabatan</label>
                            </div>
                            <div class="col-md-10">
                                <select name="id_lokasi" id="id_lokasi" class="form-control">
                                    <?php $__currentLoopData = $lokasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lokasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lokasi->id_lokasi); ?>" <?php if(!empty($data)): ?> <?php if ($data->id_lokasi == $lokasi->id_lokasi) {
                                                                                                    echo " selected";
                                                                                                } ?> <?php endif; ?>><?php echo e($lokasi->nama_lokasi); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
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
<?php echo $__env->make('admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kartu_ujian\resources\views/admin/posisi_create.blade.php ENDPATH**/ ?>