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
                <form action="{{route('data_lokasi.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card"><br>
                        <div class="row col-md-12">
                            <div class="col-md-2">
                                <label for="nama_lokasi">Nama Lokasi</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="nama_lokasi" id="nama_lokasi" class="form-control">
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