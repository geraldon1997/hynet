@extends('layouts.auths')

@section('content')

<form action="{{ route('auth.login') }}" method="post">
@csrf
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
        <div class="form-group col-md-4">
            <a href="{{ route('user.forgot-password') }}">Forgot Password?</a>
        </div>
        <div class="form-group col-md-4">
            <a href="{{ route('user.register') }}">Don't have an account?</a>
        </div>
    </div>
</form>

@endsection
