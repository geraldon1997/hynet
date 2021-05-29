@extends('layouts.auths')

@section('content')

<form action="{{ route('user.submit-password-reset') }}" method="post">
@csrf
<input type="hidden" name="token" value="{{ $token }}">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="username">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email address">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="username">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="username">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <button type="submit" class="btn btn-primary">Reset</button>
        </div>
    </div>
</form>

@endsection
