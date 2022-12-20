@extends('admin.template')
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
        <div class="container col-md-9"><br>            
            <table class="table">
                <tr>
                    <th>Nama Peserta</th>
                    <th>NIK Peserta</th>
                    <th>Status Peserta</th>
                    <th>Pendidikan Peserta</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                @foreach($data as $data)
                <tr>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->nik}}</td>
                    <td>{{$data->status_pendaftaran}}</td>
                    <td>{{$data->pendidikan}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>
                        <a href="{{route('data_diri.show', $data->id_user)}}" class="btn btn-primary">View</a>                    
                        {{ Form::open(array('route' => array('data_diri.destroy', $data->id_user), 'method' => 'delete')) }}
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