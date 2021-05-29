@extends('layouts.dashboard')
@section('content')

@php
use App\User;
use App\Plan;
use App\PaymentMethod;

$sn = 1;
@endphp
<div class="col-md-12">
    <div class="card card-tasks">
        <div class="card-header ">
            <h4 class="card-title">All Deposits</h4>

        </div>
        <div class="card-body ">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        @if (isAdmin())
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Plan</th>
                            <th>payment method</th>
                            <th>amount</th>
                            <th>daily profit</th>
                            <th>roi</th>
                            <th>maturity date</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                        @else
                        <tr>
                            <th>#</th>
                            <th>Plan</th>
                            <th>Payment Method</th>
                            <th>Amount</th>
                            <th>Daily profit</th>
                            <th>Roi</th>
                            <th>Maturity Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @endif
                    </thead>

                    <tbody>
                        @forelse ($deposits as $deposit)
                            @if (isAdmin())
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ User::find($deposit->user_id)->username }}</td>
                                    <td>{{ Plan::find($deposit->plan_id)->name }}</td>
                                    <td>{{ PaymentMethod::find($deposit->payment_method_id)->name }}</td>
                                    <td>${{ number_format($deposit->amount) }}</td>
                                    <td>${{ $deposit->daily_profit }}</td>
                                    <td>${{ number_format($deposit->roi) }}</td>
                                    <td>{{ $deposit->maturity_date ? $deposit->maturity_date : 'not paid' }}</td>
                                    <td>
                                        @if ($deposit->status == 0)
                                            <button class="btn btn-outline-warning btn-xs">pending</button>
                                        @elseif ($deposit->status == 1)
                                            <button class="btn btn-outline-primary btn-xs">active</button>
                                        @elseif ($deposit->status == 2)
                                            <button class="btn btn-outline-success btn-xs">completed</button>
                                        @endif
                                    </td>
                                    <td>
                                    @if ($deposit->is_paid)
                                        <button class="btn btn-warning btn-xs" form="not-paid-{{ $deposit->id }}"><i class="fa fa-external-link"></i></button>
                                        <button class="btn btn-primary btn-xs" form="confirm-payment-{{ $deposit->id }}"><i class="fa fa-external-link"></i></button>
                                    @endif
                                        <button class="btn btn-danger btn-xs" form="delete-{{ $deposit->id }}"><i class="fa fa-trash"></i></button>

                                        <form action="{{ route('deposit.has-not-paid', $deposit->id) }}" id="not-paid-{{ $deposit->id }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        </form>

                                        <form action="{{ route('deposit.confirm-payment', $deposit->id) }}" id="confirm-payment-{{ $deposit->id }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        </form>

                                        <form action="{{ route('deposit.destroy', $deposit->id) }}" id="delete-{{ $deposit->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        </form>

                                    </td>
                                </tr>
                            @else
                            <tr>
                                <td>{{ $sn++ }}</td>
                                <td>{{ Plan::find($deposit->plan_id)->name }}</td>
                                <td>{{ PaymentMethod::find($deposit->payment_method_id)->name }}</td>
                                <td>${{ number_format($deposit->amount) }}</td>
                                <td>${{ $deposit->daily_profit }}</td>
                                <td>${{ number_format($deposit->roi) }}</td>
                                <td>{{ $deposit->maturity_date ? $deposit->maturity_date : "pending" }}</td>
                                <td>
                                    @if ($deposit->status == 0)
                                        <button class="btn btn-outline-warning btn-sm">Pending</button>
                                    @elseif ($deposit->status == 1)
                                        <button class="btn btn-outline-primary btn-sm">Active</button>
                                    @elseif ($deposit->status == 2)
                                        <button class="btn btn-outline-success btn-sm">Completed</button>
                                    @endif
                                </td>
                                <td>
                                @if ($deposit->is_paid == 0)
                                    <a href="{{ route('deposit.payment-page', $deposit->id) }}" class="btn btn-primary btn-xs">Pay</a>

                                    <button onclick="event.preventDefault(); $('#mark-as-paid-{{ $deposit->id }}').submit();" class="btn btn-success btn-xs"><i class="la la-external-link"></i> Mark as Paid</button>
                                    <form action="{{ route('deposit.has-paid', $deposit->id) }}" method="post" id="mark-as-paid-{{ $deposit->id }}">
                                    @method('PUT')
                                    @csrf
                                    </form>
                                @else
                                    @if ($deposit->status == 0)
                                        <button class="btn btn-outline-warning">pending</button>
                                    @elseif ($deposit->status == 1)
                                        <button class="btn btn-outline-primary">Active</button>
                                    @elseif ($deposit->status == 2)
                                        <button class="btn btn-outline-success">Completed</button>
                                    @endif
                                @endif
                                </td>
                            </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="100%">No deposit found</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
        <div class="card-footer ">
            <div class="stats">

            </div>
        </div>
    </div>
</div>
    @endsection
