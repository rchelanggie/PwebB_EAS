<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        a {
            color: white;
        }

        body {
            background-color: black;
            color: white;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 60px;
        }

        .card {
            background-color: transparent;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin Pendaftaran CPNS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php echo $__env->yieldContent('home'); ?>">
                    <a class="nav-link" href="<?php echo e(URL::to('admin')); ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php echo $__env->yieldContent('data_diri'); ?>">
                    <a class="nav-link" href="<?php echo e(URL::to('data_diri')); ?>">Data Peserta</a>
                </li>
                <li class="nav-item <?php echo $__env->yieldContent('data_posisi'); ?>">
                    <a class="nav-link" href="<?php echo e(URL::to('data_posisi')); ?>">Data Posisi</a>
                </li>
                <li class="nav-item <?php echo $__env->yieldContent('data_lokasi'); ?>">
                    <a class="nav-link" href="<?php echo e(URL::to('data_lokasi')); ?>">Data Lokasi</a>
                </li>                
            </ul>
        </div>
    </nav><br>
    <?php echo $__env->yieldContent('content'); ?>
    <footer class="text-center">
        Admin Pendaftaran CPNS &copy; 2022
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://example.com/fontawesome/v6.2.0/js/all.js" data-auto-replace-svg="nest"></script><?php /**PATH C:\xampp\htdocs\kartu_ujian\resources\views/admin/template.blade.php ENDPATH**/ ?>