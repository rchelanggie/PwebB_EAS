@extends('users.template')
@section('data_diri','active')
@section('content')

<body>
    <div class="container">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        @auth
        <h5>Welcome <b>{{ Auth::user()->username }}</b></h5>
        <div class="container col-md-9"><br><br>
            <form action="{{route('data_diri.update', $data->id_user)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="card"><br>
                    <div class="row col-md-12">
                        <div class="col-md-2">
                            <label for="foto">Foto</label>                        
                        </div>
                        <div class="col-md-10">      
                            @if(!empty($data))
                            <img src="../../foto/{{$data->foto}}" alt="" width="300px"><br><br>
                            @endif                      
                            <input type="file" name="foto" id="foto" class="form-control">                            
                        </div>
                    </div><br>
                    <div class="row col-md-12">
                        <div class="col-md-2">
                            <label for="nama">Nama Sesuai KTP</label>                        
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="nama" id="nama" class="form-control"
                            @if(!empty($data))
                            value="{{$data->nama}}"
                            @endif
                            >
                        </div>
                    </div><br>
                    <div class="row col-md-12">
                        <div class="col-md-2">
                            <label for="nik">NIK</label>                        
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="nik" id="nik" class="form-control"
                            @if(!empty($data))
                            value="{{$data->nik}}"
                            @endif
                            >
                        </div>
                    </div><br>
                    <div class="row col-md-12">
                        <div class="col-md-2">
                            <label for="tempat_lahir">Tempat Lahir</label>                        
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                            @if(!empty($data))
                            value="{{$data->tempat_lahir}}"
                            @endif
                            >
                        </div>
                    </div><br>
                    <div class="row col-md-12">
                        <div class="col-md-2">
                            <label for="pendidikan">Pendidikan Terakhir</label>                        
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="pendidikan" id="pendidikan" class="form-control"
                            @if(!empty($data))
                            value="{{$data->pendidikan}}"
                            @endif
                            >
                        </div>
                    </div><br>
                    <div class="row col-md-12">
                        <div class="col-md-2">
                            <label for="alamat">Alamat Sesuai KTP</label>                        
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="alamat" id="alamat" class="form-control"
                            @if(!empty($data))
                            value="{{$data->alamat}}"
                            @endif
                            >
                        </div>
                    </div><br>
                    <div class="row col-md-12">
                        <div class="col-md-2">
                            <label for="tanggal_lahir">Tanggal Lahir</label>                        
                        </div>
                        <div class="col-md-10">
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                            @if(!empty($data))
                            value="{{date('Y-m-d',strtotime($data->tanggal_lahir))}}"
                            @endif
                            >
                        </div>
                    </div><br>
                    <div class="row col-md-12">
                        <div class="col-md-2">
                            <label for="jenis_kelamin">Jenis Kelamin</label>                        
                        </div>
                        <div class="col-md-10">
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="F" 
                            @if(!empty($data))
                            <?php if ($data->jenis_kelamin == 'F') { echo " checked"; } ?>                            
                            @endif> Wanita
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="M"
                            @if(!empty($data))
                            <?php if ($data->jenis_kelamin == 'M') { echo " checked"; } ?>                            
                            @endif> Pria
                        </div>
                    </div><br>
                    <div class="row col-md-12">
                        <div class="col-md-2">
                            <label for="posisi_jabatan">Posisi Jabatan</label>                        
                        </div>
                        <div class="col-md-10">
                            <select name="posisi_jabatan" id="posisi_jabatan" class="form-control">
                            @foreach($posisi as $posisi)
                                <option value="{{$posisi->id_posisi}}" @if(!empty($data))
                                <?php if ($data->id_posisi == $posisi->id_posisi) { echo " selected"; } ?>                            
                                @endif>{{$posisi->nama_posisi}}-{{$posisi->nama_lokasi}}</option>
                            @endforeach    
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
        
        @endauth
    </div>
</body>
@endsection