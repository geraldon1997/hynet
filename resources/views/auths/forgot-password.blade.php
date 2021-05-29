@extends('layouts.auths')

@section('content')

<form action="{{ route('user.send-password-reset-link') }}" method="post">
@csrf
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="username">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email address">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

@endsection
