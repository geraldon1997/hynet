@extends('layouts.dashboard')

@section('content')

@php

use App\Account;
use App\Deposit;
use App\Withdrawal;
use App\Referral;
use App\User;
use App\Plan;
use App\PaymentMethod;

@endphp

<h4 class="page-title">Welcome to {{ config('app.name') }}</h4>

    @if (isAdmin())

    <div class="row">
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
                                <p class="card-category">Users</p>
                                <h4 class="card-title"> {{ User::all() ? User::all()->count() : 0 }} </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats card-success">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="la la-bar-chart"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Plans</p>
                                <h4 class="card-title"> {{ Plan::all() ? Plan::all()->count() : 0 }} </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats card-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="la la-newspaper-o"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Payment Methods</p>
                                <h4 class="card-title"> {{ PaymentMethod::all() ? PaymentMethod::all()->count() : 0 }} </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats card-primary">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="la la-check-circle"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Deposit History</p>
                                <h4 class="card-title"> {{ Deposit::all() ? Deposit::all()->count() : 0 }} </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @else

    <div class="row">
        <div class="col-md-3">
            <div class="card card-stats card-secondary">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="la la-check-circle"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Daily Profit</p>
                                <h4 class="card-title">${{ $total_sum_of_daily_profit ? $total_sum_of_daily_profit : 0 }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <a href="{{ route('account.index') }}">
                <div class="card card-stats card-warning">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="la la-bank"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <p class="card-category">Account</p>
                                    <h4 class="card-title">${{ Account::where('user_id', auth()->user()->id)->first() === null ? 0 : Account::where('user_id', auth()->user()->id)->first()->balance }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('deposit.index') }}">
                <div class="card card-stats card-success">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="la la-bar-chart"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <p class="card-category">Deposits</p>
                                    <h4 class="card-title">{{ Deposit::whereUser_id(auth()->user()->id)->get()->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('withdrawal.index') }}">
                <div class="card card-stats card-danger">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="la la-newspaper-o"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <p class="card-category">Withdrawals</p>
                                    <h4 class="card-title">{{ Withdrawal::where('user_id', auth()->user()->id)->get()->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card card-stats card-primary">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="la la-money"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Current Deposit</p>
                                <h4 class="card-title">{{ $current_deposit ? '$'.number_format($current_deposit->amount) : 0 }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="col-md-3">
                <a href="{{ route('user.referrals') }}">
                    <div class="card card-stats card-primary">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="la la-users"></i>
                                    </div>
                                </div>
                                <div class="col-7 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="card-category">Referrals</p>
                                        <h4 class="card-title">{{ Referral::whereReferrer(auth()->user()->id)->get()->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>


    </div>
    @endif

@endsection
