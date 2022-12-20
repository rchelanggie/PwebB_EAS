
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<body>
    <div class="container col-md-12">
        <table class="table table-border">
            <tr>
                <td>Lokasi</td>
                <td>{{$data->nama_lokasi}}</td>
                <td rowspan="5"><img src="C:/xampp/htdocs/kartu_ujian/public/foto/{{$data->foto}}" alt="" width="300px"></td>
            </tr>
            <tr>
                <td>Instansi</td>
                <td>{{$data->nama_posisi}}</td>
            </tr>
            <tr>
                <td>No. Identitas</td>
                <td>{{$data->nik}}</td>
            </tr>
            <tr>
                <td>No. Peserta</td>
                <td>{{$data->id_kartu}}</td>
            </tr>
            <tr>
                <td>Nama Peserta</td>
                <td>{{$data->nama}}</td>
            </tr>
            <tr>
                <td>Tempat/Tanggal Lahir</td>
                <td>{{$data->tempat_lahir}} {{date('Y-m-d', strtotime($data->tanggal_lahir))}}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>{{$data->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td>Pendidikan</td>
                <td>{{$data->pendidikan}}</td>
            </tr>
        </table>
        
    </div>
</body>