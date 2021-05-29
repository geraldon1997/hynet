@extends('layouts.dashboard')

@section('content')
@php
use App\User;

$sn = 1;
@endphp
<div class="col-md-12">
    <div class="card card-tasks">
        <div class="card-header">
            <h4 class="card-title">Referrals</h4>
            <p>Referral Link:</p>
            <div class="row">
                <div class="col-md-8">
                    <input style="color: black;" type="text" id="ref" class="form-control" value="{{ route('home.index', ['ref' => auth()->user()->username]) }}" readonly>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary" id="copy-ref">Copy</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Bonus</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse ($refs as $ref)

                            <tr>
                                <td>{{ $sn++ }}</td>
                                <td>{{ User::find($ref->referred)->fullname }}</td>
                                <td>{{ $ref->bonus ? $ref->bonus : 0 }}</td>
                                <td>
                                @if ($ref->is_withdrawn === 0)
                                    @if ($ref->bonus < 1)
                                        <button class="btn btn-outline-warning btn-xs">No Bonus Yet</button>
                                    @else
                                        <button class="btn btn-primary btn-xs" form="withdraw"><i class="fa fa-external-link"></i> Withdraw to Balance</button>
                                    @endif
                                @elseif ($ref->is_withdrawn === 1)
                                    <button class="btn btn-outline-success btn-xs">Withdrawn to Balance</button>
                                @endif
                                    <form action="{{ route('user.withdraw-referral-bonus', $ref->id) }}" method="post" id="withdraw">
                                    @method('PUT')
                                    @csrf
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%">No Referrals Yet</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function copyref() {
        $('#copy-ref').click(() => {
            var ref = $('#ref');
            ref.select();

            document.execCommand('copy');
            ref.css('background', 'white');
            $('#copy-ref').html('Referral Link copied . . .')

            setTimeout(() => {
                $('#copy-ref').html('Copy')
            }, 2000);

        })
    }
    copyref();
</script>
@endsection
