@extends('layouts.dashboard')

    @section('content')

@php
$sn = 1;
@endphp
    <div class="col-md-12">
        <div class="card card-tasks">
            <div class="card-header ">
                <h4 class="card-title">Withdrawal Methods</h4>
                <a href="{{ route('withdrawalmethod.create') }}" class="btn btn-primary"><span class="la la-plus"></span>Add</a>
            </div>
            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($methods as $method)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $method->name }}</td>
                                    <td>
                                        <a href="{{ route('withdrawalmethod.edit', $method->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-danger btn-sm" onclick="event.preventDefault(); $('#destroy-method-{{ $method->id }}').submit();"><i class="fa fa-trash"></i></button>
                                        <form action="{{ route('withdrawalmethod.destroy', $method->id) }}" id="destroy-method-{{ $method->id }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%">no withdrawal methods found</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="card-footer ">

            </div>
        </div>
    </div>
    @endsection
