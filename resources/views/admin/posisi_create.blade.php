@extends('admin.template')
@section('data_posisi','active')
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
        <!-- data diri -->
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#data_posisi" role="button" aria-expanded="false" aria-controls="data_posisi">
                Data Posisi
            </a>
        </p>
        <div class="collapse" id="data_posisi">
            <div class="card card-body">
                <form action="{{route('data_posisi.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
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
                                    @foreach($lokasi as $lokasi)
                                    <option value="{{$lokasi->id_lokasi}}" @if(!empty($data)) <?php if ($data->id_lokasi == $lokasi->id_lokasi) {
                                                                                                    echo " selected";
                                                                                                } ?> @endif>{{$lokasi->nama_lokasi}}</option>
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
        </div><br>
        
        @endauth
    </div>
</body>
@endsection