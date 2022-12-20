@extends('users.template')
@section('data_berkas','active')
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
        <div class="container col-md-9"><br>
            @if(!empty($data))
                @if($data->status_dokumen != "Verified")
                <a href="{{route('data_berkas.edit', Auth::user()->id)}}" class="btn btn-warning">Update Data</a><br><br>
                @endif
            @endif
            <form action="{{route('data_berkas.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card"><br>
                    <div class="row col-md-12">
                        <div class="col-md-2">
                            <label for="ijazah">Scan Ijazah</label>
                        </div>
                        <div class="col-md-10">
                            @if(!empty($data))
                            <img src="../foto/{{$data->ijazah}}" alt="" width="300px"><br><br>
                            @else
                            <input type="file" name="ijazah" id="ijazah" class="form-control">
                            @endif
                        </div>
                    </div><br>
                    <div class="row col-md-12">
                        <div class="col-md-2">
                            <label for="ktp">Scan KTP</label>
                        </div>
                        <div class="col-md-10">
                            @if(!empty($data))
                            <img src="../foto/{{$data->ktp}}" alt="" width="300px"><br><br>
                            @else
                            <input type="file" name="ktp" id="ktp" class="form-control">
                            @endif
                        </div>
                    </div><br>
                    <div class="row col-md-12">
                        <div class="col-md-2">
                            <label for="kk">Scan Kartu Keluarga</label>
                        </div>
                        <div class="col-md-10">
                            @if(!empty($data))
                            <img src="../foto/{{$data->kk}}" alt="" width="300px"><br><br>
                            @else
                            <input type="file" name="kk" id="kk" class="form-control">
                            @endif
                        </div>
                    </div><br>
                    <div class="row col-md-12">
                        <div class="col-md-2">
                            <label for="formulir">Formulir Pendaftaran<span class="text-danger"> (.pdf)</span></label>
                        </div>
                        <div class="col-md-10">
                            @if(!empty($data))
                            <a href="{{ route('dokumen', $data->formulir) }}" class="btn btn-secondary">{{$data->formulir}}</a>
                            @else
                            <input type="file" name="formulir" id="formulir" class="form-control">
                            @endif
                        </div>
                    </div><br>
                    <div class="text-center">
                        @if(empty($data))
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-danger">Clear</button>
                        @else
                        <a class="btn btn-success" href="#">Status Documents: {{$data->status_dokumen}}</a>
                        @endif 
                    </div><br><br>
                </div>
            </form>
        </div>

        @endauth
    </div>
</body>
@endsection