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
        <h5>Welcome <b>{{ Auth::user()->username }}</b></h5><br>
        <a href="{{route('data_posisi.create')}}" class="btn btn-warning">Create Data</a><br><br>
        <div class="container col-md-9"><br>            
            <table class="table">
                <tr>
                    <th>Nama Posisi</th>
                    <th>Nama Lokasi</th>
                    <th>Action</th>
                </tr>
                @foreach($posisi as $posisi)
                <tr>
                    <td>{{$posisi->nama_posisi}}</td>
                    <td>{{$posisi->nama_lokasi}}</td>
                    <td>
                        <a href="{{route('data_posisi.show', $posisi->id_posisi)}}" class="btn btn-primary">View</a>                       
                        {{ Form::open(array('route' => array('data_posisi.destroy', $posisi->id_posisi), 'method' => 'delete')) }}
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