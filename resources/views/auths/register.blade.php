@extends('layouts.auths')

@section('content')

<form action="{{ route('user.register') }}" method="post">
@csrf
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="username">Fullname</label>
            <input type="text" name="fullname" class="form-control" placeholder="Fullname">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="password">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="password">Username</label>
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
        <div class="form-group col-md-6">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>

        <div class="form-group col-md-6">
            <a href="{{ route('user.login') }}">Already a user?</a>
        </div>
    </div>
</form>

@endsection
