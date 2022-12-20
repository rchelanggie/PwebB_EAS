@extends('users.template')
@section('content')

<body>
    <div class="container">
        @if(!empty($successMsg))
        <div class="alert alert-success"> {{ $successMsg }}</div>
        @endif
        @auth
        <h5>Welcome <b>{{ Auth::user()->username }}</b></h5>
        @endauth
        @if(!empty($data))
        <div class="container col-md-9"><br><br>
            <a class="btn btn-primary" target="_blank" href="{{ URL::to('createPDF') }}">Export to PDF</a><br><br>
            <table class="table table-border">
                <tr>
                    <td>Lokasi</td>
                    <td>{{$data->nama_lokasi}}</td>
                    <td rowspan="3"><img src="../foto/{{$data->foto}}" alt="" width="300px"></td>
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
                    <td>{{$data->tempat_lahir}}/{{date('Y-m-d', strtotime($data->tanggal_lahir))}}</td>
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
        </div><br><br>
        @endif
    </div>
</body>
@endsection