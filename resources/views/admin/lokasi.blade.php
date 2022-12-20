@extends('admin.template')
@section('data_lokasi','active')
@section('content')

<body>
    <div class="container">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        @auth
        <h5>Welcome <b>{{ Auth::user()->username }}</b></h5><br>
        <a href="{{route('data_lokasi.create')}}" class="btn btn-warning">Create Data</a><br><br>
        <div class="container col-md-9"><br>            
            <table class="table">
                <tr>
                    <th>Nama Lokasi</th>
                    <th>Action</th>
                </tr>
                @foreach($lokasi as $lokasi)
                <tr>
                    <td>{{$lokasi->nama_lokasi}}</td>
                    <td>
                        <a href="{{route('data_lokasi.show', $lokasi->id_lokasi)}}" class="btn btn-primary">View</a>                       
                        {{ Form::open(array('route' => array('data_lokasi.destroy', $lokasi->id_lokasi), 'method' => 'delete')) }}
                        <button type="submit" class="btn btn-danger">Delete</button>
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        
        @endauth
    </div>
</body>
@endsection