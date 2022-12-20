
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<body>
    <div class="container col-md-12">
        <table class="table table-border">
            <tr>
                <td>Lokasi</td>
                <td><?php echo e($data->nama_lokasi); ?></td>
                <td rowspan="5"><img src="C:/xampp/htdocs/kartu_ujian/public/foto/<?php echo e($data->foto); ?>" alt="" width="300px"></td>
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
                <td><?php echo e($data->tempat_lahir); ?> <?php echo e(date('Y-m-d', strtotime($data->tanggal_lahir))); ?></td>
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
        
    </div>
</body><?php /**PATH C:\xampp\htdocs\kartu_ujian\resources\views/users/kartu_ujian_pdf.blade.php ENDPATH**/ ?>