@extends('users.template')
@section('home','active')
@section('content')

<body>
    <div class="container">
        @if(!empty($successMsg))
        <div class="alert alert-success"> {{ $successMsg }}</div>
        @endif
        <div class="container">
            <h3>Welcome to Pendaftaran CPNS 2022</h3>
            <div class="text-center">
                <img src="../foto/colorful simple world humanitarian day facebook post.png" alt="" width="400px">
            </div>
        </div><br><br>
        <div class="container text-center">
            @guest
            <a class="btn btn-warning" href="{{ route('login') }}">Login</a>
            @endguest
            @auth
            <a class="btn btn-warning" href="{{ route('logout') }}">Logout</a>
            @endauth
        </div>        
        <br>
    </div>
</body>
@endsection