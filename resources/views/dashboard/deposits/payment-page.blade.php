@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-12 text-center">
        <div class="card card-tasks">
            <div class="card-header">
                <h4 class="card-title">Deposit with cryptocurrency to {{ config('app.name') }} </h4>
            </div>
            <h6 style="color:green; font-weight: bold;">NB: Please use BEP-20 Networks</h6>
            <div class="row">
                <div class="card-body col-md-8 offset-md-2">
                <b style="color:red;">After Payment, please submit proof to <a href="mailto:{{ accountsEmail() }}">{{ accountsEmail() }}</a></b>
                <br>
                    <img src="http://barcode.hynetcapital.com/barcode.php?s=qr&d={{ $address }}" alt="" width="250">

                    <div class="row">
                    <div class="col-md-10">
                        <input type="text" value="{{ $address }}" id="address" class="form-control" style="color: black;" readonly>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-primary" id="copy-address">Copy</button>
                    </div>
                    </div>

                    <ul style="list-style: none;">
                        <li><b>Amount (USD): ${{ $amount }}</b></li>
                        <li><b>Amount ({{ $symbol }}): <i id="coin"></i></b></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function getRate()
    {
        let API_KEY = "88e46acaed38e8d09f960adc39d10a1f4b7eecdb2691e3d6c8bffca3d5adb1f0";
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
        getRate();
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
