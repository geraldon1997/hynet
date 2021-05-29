@extends('layouts.dashboard')

@section('content')

@php
use App\User;
use App\WithdrawalMethod as WM;
$sn = 1;
@endphp

@if (!isAdmin())
<div class="col-md-3">
    <div class="card card-stats card-warning">
        <div class="card-body ">
            <div class="row">
                <div class="col-5">
                    <div class="icon-big text-center">
                        <i class="la la-users"></i>
                    </div>
                </div>
                <div class="col-7 d-flex align-items-center">
                    <div class="numbers">
                        <p class="card-category">Balance</p>
                        <h4 class="card-title">${{ $accounts ? number_format($accounts->balance) : 0 }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="col-md-12">
    <div class="card card-tasks">
        <div class="card-header ">
            <h4 class="card-title">Account</h4>

        </div>
        <div class="card-body ">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    @if (isAdmin())
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Balance</th>
                        </tr>
                    @else
                        <tr>
                            <th>Amount</th>
                            <th>Withdrawal Method</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    @endif
                    </thead>

                    <tbody>
                        @if (isAdmin())
                            @forelse ($accounts as $account)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ User::find($account->user_id)->username }}</td>
                                    <td>${{ number_format($account->balance) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No Account available</td>
                                </tr>
                            @endforelse
                        @else
                        @if ($accounts)
                            <tr>
                            <form action="{{ route('user.withdraw') }}" method="post" id="my_form">@csrf</form>
                                <td>
                                    <input type="number" form="my_form" class="form-control" name="amount" placeholder="Amount" required>
                                </td>
                                <td>
                                    <select name="method" form="my_form" class="form-control" required>
                                        <option value="">choose withdrawal method</option>
                                        @forelse(WM::all() as $wm)
                                            <option value="{{ $wm->id }}">{{ $wm->name }}</option>
                                        @empty
                                            <option value="">No Withdrawal Methods Available</option>
                                        @endforelse
                                    </select>
                                </td>
                                <td>
                                    <textarea type="text" name="address" class="form-control" form="my_form" placeholder="address"></textarea>
                                </td>
                                <td>
                                @if ($accounts->balance > 100)
                                    <button form="my_form" class="btn btn-primary btn-xs">Withdraw</button>
                                @else
                                    <button class="btn btn-outline-warning btn-xs" disabled>insufficient funds</button>
                                @endif
                                </td>
                            </tr>
                            @endif
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
