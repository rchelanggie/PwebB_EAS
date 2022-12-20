@extends('users.template')
@section('login','active')
@section('content')
<div class="container col-md-9">
    @if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
    @endif
    @if($errors->any())
    @foreach($errors->all() as $err)
    <p class="alert alert-danger">{{ $err }}</p>
    @endforeach
    @endif
    <h3>Welcome User</h3>
    <div class="row">
        <div class="col-md-6">
            <img src="../foto/colorful simple world humanitarian day facebook post.png" alt="" width="400px">
        </div>
        <div class="card col-md-6"><br>
            <form action="{{ route('register.action') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Username <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="username" value="{{ old('username') }}" />
                </div>
                <div class="mb-3">
                    <label>Email <span class="text-danger">*</span></label>
                    <input class="form-control" required type="email" name="email" value="{{ old('email') }}" />
                </div>
                <div class="mb-3">
                    <label>Password <span class="text-danger">*</span></label>
                    <input class="form-control" required type="password" name="password" />
                </div>
                <div class="mb-3">
                    <label>Password Confirmation<span class="text-danger">*</span></label>
                    <input class="form-control" required type="password" name="password_confirm" />
                </div>
                <div class="mb-3 text-center">
                    <button class="btn btn-primary">Register</button>
                    <button class="btn btn-danger" type="reset">Clear</button>
                </div>
                <p align="center">Already a user? <a href="{{ URL::to('login') }}">Login Here</a></p>
            </form>
        </div>
    </div>
</div>
@endsection