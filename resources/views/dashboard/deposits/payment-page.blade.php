@extends('layouts.dashboard')

@section('content')
<div class="col-md-12 text-center">
    <div class="card card-tasks">
        <div class="card-header">
            <h4 class="card-title">Deposit with cryptocurrency to {{ config('app.name') }} </h4>
        </div>
        <h2 style="color:green; font-weight: bold;">NB: Please use BEP-20 Networks</h2>
        <div class="card-body col-md-8 offset-2">
        <b style="color:red;">After Payment, please submit proof to <a href="mailto:accounts@durantfinance">accounts@durantfinance.com</a></b>
        <br>
            <img src="/assets/barcode/barcode.php?s=qr&d={{ $address }}" alt="" width="250">

            <div class="row">
            <div class="col-md-10">
                <input type="text" value="{{ $address }}" id="address" class="form-control" style="color: black;" readonly>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary" id="copy-address">Copy</button>
            </div>
            </div>

            <ul style="list-style: none;">
                <li><h4>Amount (USD): ${{ $amount }}</h4></li>
                <li><h4>Amount ({{ $symbol }}): <i id="coin"></i></h4></li>
            </ul>

        </div>
    </div>
</div>

<script>
    function getRate()
    {
        let API_KEY = "0132e439712199d70b2dda6bded5661424c020025d2bf979dcc403d0887171d1";
        let COIN = "{{ $symbol }}";
        let FIAT = "{{ $amount }}";
        let URL = "https://min-api.cryptocompare.com/data/price?fsym=USD&tsyms="+COIN;
        $.ajax({
            type: 'GET',
            url: URL
        }).done(result => {
            let rate = result[COIN] * FIAT;
            $('#coin').html(rate);
        });
    }

    setTimeout(() => {
        // getRate();
    }, 1000);

    function copyaddress() {
        $('#copy-address').click(() => {
            var addr = $('#address');
            addr.select();

            document.execCommand('copy');
            addr.css('background', 'white');
            $('#copy-address').html('address copied . . .')

            setTimeout(() => {
                $('#copy-address').html('Copy')
            }, 2000);

        })
    }
    copyaddress();
</script>

@endsection
