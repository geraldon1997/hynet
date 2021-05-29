@extends('layouts.dashboard')

@section('content')
@php
$sn = 1;
@endphp
<h4 class="page-title"><em>Users</em></h4>
<!-- <div class="row"> -->
<div class="card">
            <div class="card-header">
                <div class="card-title">List of users</div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-head-bg-success">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fullname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $sn++ }}</td>
                            <td>{{ $user->fullname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ route('user.edit', $user->id) }}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-info btn-sm" href="{{ route('user.compose-email', $user->id) }}"><i class="fa fa-envelope"></i></a>
                                <a class="btn btn-success btn-sm" href="{{ route('user.fund-account', $user->id) }}"><i class="fa fa-money"></i></a>
                                <button class="btn btn-danger btn-sm" onclick="event.preventDefault(); $('#destroy-user-{{ $user->id }}').submit();"><i class="fa fa-trash"></i></button>
                                <form action="{{ route('user.destroy', $user->id) }}" method="post" id="destroy-user-{{ $user->id }}">
                                @method('DELETE')
                                @csrf
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100%">no users found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            </div>
        </div>
<!-- </div> -->
@endsection
