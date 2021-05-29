@extends('layouts.dashboard')

@section('content')

@php
use App\User;
use App\WithdrawalMethod as WM;
$sn = 1;
@endphp


<div class="col-md-12">
    <div class="card card-tasks">
        <div class="card-header ">
            <h4 class="card-title">Withdrawal History</h4>

        </div>
        <div class="card-body ">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        @if (isAdmin())
                            <th>#</th>
                            <th>User</th>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Address</th>
                            <th>Requested On</th>
                            <th>Paid on</th>
                            <th>Status</th>
                            <th>Action</th>
                        @else
                            <th>#</th>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Address</th>
                            <th>Requested On</th>
                            <th>Paid on</th>
                            <th>Status</th>
                        @endif
                    </thead>

                    <tbody>
                        @if (isAdmin())
                            @forelse ($withdrawals as $withdrawal)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ User::find($withdrawal->user_id)->username }}</td>
                                    <td>${{ number_format($withdrawal->amount) }}</td>
                                    <td>{{ WM::find($withdrawal->withdrawal_method_id)->name }}</td>
                                    <td>{{ $withdrawal->address }}</td>
                                    <td>{{ $withdrawal->requested_on }}</td>
                                    <td>{{ $withdrawal->paid_on ? $withdrawal->paid_on : 'not paid' }}</td>
                                    <td>
                                        @if ($withdrawal->status == 0)
                                            <button class="btn btn-outline-warning btn-xs">Pending</button>
                                        @elseif ($withdrawal->status == 1)
                                            <button class="btn btn-outline-success btn-xs">Paid</button>
                                        @endif
                                    </td>
                                    <td>
                                    @if ($withdrawal->status == 0)
                                        <button form="paid-{{ $withdrawal->id }}" class="btn btn-primary btn-xs"><i class="fa fa-external-link"></i></button>
                                    @endif
                                        <button form="delete-{{ $withdrawal->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>

                                        <form action="{{ route('withdrawal.update', $withdrawal->id) }}" id="paid-{{ $withdrawal->id }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        </form>

                                        <form action="{{ route('withdrawal.destroy', $withdrawal->id) }}" id="delete-{{ $withdrawal->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%">No history found</td>
                                </tr>
                            @endforelse
                        @else
                            @forelse ($withdrawals as $withdrawal)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>${{ number_format($withdrawal->amount) }}</td>
                                    <td>{{ WM::find($withdrawal->withdrawal_method_id)->name }}</td>
                                    <td>{{ $withdrawal->address }}</td>
                                    <td>{{ $withdrawal->requested_on }}</td>
                                    <td>{{ $withdrawal->paid_on ? $withdrawal->paid_on : 'not paid' }}</td>
                                    <td>
                                        @if ($withdrawal->status == 0)
                                            <button class="btn btn-outline-warning btn-xs">Pending</button>
                                        @elseif ($withdrawal->status == 1)
                                            <button class="btn btn-outline-success btn-xs">Paid</button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%">No history</td>
                                </tr>
                            @endforelse
                        @endif
                    </tbody>

                </table>
            </div>
        </div>
        <div class="card-footer ">

        </div>
    </div>
</div>

@endsection
