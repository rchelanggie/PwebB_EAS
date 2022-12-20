
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
        <!-- data diri -->
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#data_diri" role="button" aria-expanded="false" aria-controls="data_diri">
                Data Diri
            </a>
        </p>
        <div class="collapse" id="data_diri">
            <div class="card card-body">
                <form action="<?php echo e(route('data_diri.update', $data->id_user)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="card"><br>
                        <div class="row col-md-12">
                            <div class="col-md-2">
                                <label for="foto">Foto</label>
                            </div>
                            <div class="col-md-10">
                                <?php if(!empty($data)): ?>
                                <img src="../foto/<?php echo e($data->foto); ?>" alt="" width="300px"><br><br>
                                <?php endif; ?>
                                <input readonly type="file" name="foto" id="foto" class="form-control">
                            </div>
                        </div><br>
                        <div class="row col-md-12">
                            <div class="col-md-2">
                                <label for="nama">Nama Sesuai KTP</label>
                            </div>
                            <div class="col-md-10">
                                <input readonly type="text" name="nama" id="nama" class="form-control" <?php if(!empty($data)): ?> value="<?php echo e($data->nama); ?>" <?php endif; ?>>
                            </div>
                        </div><br>
                        <div class="row col-md-12">
                            <div class="col-md-2">
                                <label for="nik">NIK</label>
                            </div>
                            <div class="col-md-10">
                                <input readonly type="text" name="nik" id="nik" class="form-control" <?php if(!empty($data)): ?> value="<?php echo e($data->nik); ?>" <?php endif; ?>>
                            </div>
                        </div><br>
                        <div class="row col-md-12">
                            <div class="col-md-2">
                                <label for="tempat_lahir">Tempat Lahir</label>
                            </div>
                            <div class="col-md-10">
                                <input readonly type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" <?php if(!empty($data)): ?> value="<?php echo e($data->tempat_lahir); ?>" <?php endif; ?>>
                            </div>
                        </div><br>
                        <div class="row col-md-12">
                            <div class="col-md-2">
                                <label for="pendidikan">Pendidikan Terakhir</label>
                            </div>
                            <div class="col-md-10">
                                <input readonly type="text" name="pendidikan" id="pendidikan" class="form-control" <?php if(!empty($data)): ?> value="<?php echo e($data->pendidikan); ?>" <?php endif; ?>>
                            </div>
                        </div><br>
                        <div class="row col-md-12">
                            <div class="col-md-2">
                                <label for="alamat">Alamat Sesuai KTP</label>
                            </div>
                            <div class="col-md-10">
                                <input readonly type="text" name="alamat" id="alamat" class="form-control" <?php if(!empty($data)): ?> value="<?php echo e($data->alamat); ?>" <?php endif; ?>>
                            </div>
                        </div><br>
                        <div class="row col-md-12">
                            <div class="col-md-2">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                            </div>
                            <div class="col-md-10">
                                <input readonly type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" <?php if(!empty($data)): ?> value="<?php echo e(date('Y-m-d',strtotime($data->tanggal_lahir))); ?>" <?php endif; ?>>
                            </div>
                        </div><br>
                        <div class="row col-md-12">
                            <div class="col-md-2">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                            </div>
                            <div class="col-md-10">
                                <input disabled type="radio" name="jenis_kelamin" id="jenis_kelamin" value="F" <?php if(!empty($data)): ?> <?php if ($data->jenis_kelamin == 'F') {
                                                                                                                                        echo " checked";
                                                                                                                                    } ?> <?php endif; ?>> Wanita
                                <input disabled type="radio" name="jenis_kelamin" id="jenis_kelamin" value="M" <?php if(!empty($data)): ?> <?php if ($data->jenis_kelamin == 'M') {
                                                                                                                                        echo " checked";
                                                                                                                                    } ?> <?php endif; ?>> Pria
                            </div>
                        </div><br>
                        <div class="row col-md-12">
                            <div class="col-md-2">
                                <label for="posisi_jabatan">Posisi Jabatan</label>
                            </div>
                            <div class="col-md-10">
                                <select readonly name="posisi_jabatan" id="posisi_jabatan" class="form-control">
                                    <?php $__currentLoopData = $posisi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posisi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($posisi->id_posisi); ?>" <?php if(!empty($data)): ?> <?php if ($data->id_posisi == $posisi->id_posisi) {
                                                                                                    echo " selected";
                                                                                                } ?> <?php endif; ?>><?php echo e($posisi->nama_posisi); ?>-<?php echo e($posisi->nama_lokasi); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div><br>
                        <div class="row col-md-12">
                            <div class="col-md-2">
                                <label for="status_pendaftaran">Status Pendaftaran </label>
                            </div>
                            <div class="col-md-10">
                                <select name="status_pendaftaran" id="status_pendaftaran" class="form-control">
                                    <option value="Verified">Verified</option>
                                    <option value="Not verified">Not verified</option>
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

        <!-- data berkas -->
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#data_berkas" role="button" aria-expanded="false" aria-controls="data_berkas">
                Data Berkas
            </a>
        </p>
        <div class="collapse" id="data_berkas">
            <div class="card card-body">
                <form action="<?php echo e(route('data_berkas.update', $data->id_user)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="card"><br>
                        <div class="row col-md-12">
                            <div class="col-md-2">
                                <label for="ijazah">Scan Ijazah</label>
                            </div>
                            <div class="col-md-10">
                                <?php if(!empty($data_berkas)): ?>
                                <img src="../foto/<?php echo e($data_berkas->ijazah); ?>" alt="" width="300px"><br><br>
                                <?php else: ?>
                                <input readonly type="file" name="ijazah" id="ijazah" class="form-control">
                                <?php endif; ?>
                            </div>
                        </div><br>
                        <div class="row col-md-12">
                            <div class="col-md-2">
                                <label for="ktp">Scan KTP</label>
                            </div>
                            <div class="col-md-10">
                                <?php if(!empty($data_berkas)): ?>
                                <img src="../foto/<?php echo e($data_berkas->ktp); ?>" alt="" width="300px"><br><br>
                                <?php else: ?>
                                <input readonly type="file" name="ktp" id="ktp" class="form-control">
                                <?php endif; ?>
                            </div>
                        </div><br>
                        <div class="row col-md-12">
                            <div class="col-md-2">
                                <label for="kk">Scan Kartu Keluarga</label>
                            </div>
                            <div class="col-md-10">
                                <?php if(!empty($data_berkas)): ?>
                                <img src="../foto/<?php echo e($data_berkas->kk); ?>" alt="" width="300px"><br><br>
                                <?php else: ?>
                                <input readonly type="file" name="kk" id="kk" class="form-control">
                                <?php endif; ?>
                            </div>
                        </div><br>
                        <div class="row col-md-12">
                            <div class="col-md-2">
                                <label for="formulir">Formulir Pendaftaran<span class="text-danger"> (.pdf)</span></label>
                            </div>
                            <div class="col-md-10">
                                <?php if(!empty($data_berkas)): ?>
                                <a href="<?php echo e(route('dokumen', $data_berkas->formulir)); ?>" class="btn btn-secondary"><?php echo e($data_berkas->formulir); ?></a>
                                <?php else: ?>
                                <input readonly type="file" name="formulir" id="formulir" class="form-control">
                                <?php endif; ?>
                            </div>
                        </div><br>
                        <div class="row col-md-12">
                            <div class="col-md-2">
                                <label for="status_dokumen">Status Dokumen </label>
                            </div>
                            <div class="col-md-10">
                                <select name="status_dokumen" id="status_dokumen" class="form-control">
                                    <option value="Verified">Verified</option>
                                    <option value="Not verified">Not verified</option>
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
        </div>
        <?php endif; ?>
    </div>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kartu_ujian\resources\views/admin/data_peserta.blade.php ENDPATH**/ ?>