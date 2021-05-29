@extends('layouts.main')

@section('content')
<div id="product" class="section c-onepage-product wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
    <div class="container">
        <h2 class="section-title text-center wow fadeIn" style="visibility: visible; animation-name: fadeIn;">Wapspeed</h2>
        <p class="section-subtitle text-center wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            Our wapspeed withdrawal process
        </p>

        <div class="product-tab">
            <nav class="o-common-nav-tab">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#product-tab-1" role="tab" aria-controls="product-tab-1" aria-selected="true">ONE</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#product-tab-2" role="tab" aria-controls="product-tab-2" aria-selected="false">TWO</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#product-tab-3" role="tab" aria-controls="product-tab-3" aria-selected="false">THREE</a>
                </div>
                <!-- End of .nav-tabs -->
            </nav>
            <!-- End of .nav -->

            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-tab-1" role="tabpanel" aria-labelledby="product-tab-1">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <img src="{{ asset('main/images/products/1.png') }}" alt="product images" class="img-fluid">
                        </div>
                        <!-- End of .col-md-6 -->

                        <div class="col-md-6">
                            <div class="o-details-with-title text-left">
                                <h3>Initiate Withdrawal</h3>
                                <p>Login to our website</p>
                                <p>Navigate to your wallet</p>
                                <p>update your wallet address if you haven't done so</p>
                                <p>Request for withdrawal</p>
                            </div>
                            <!-- End of .o-details-with-title -->
                        </div>
                        <!-- End of .col-md-6 -->
                    </div>
                    <!-- End of .row -->
                </div>
                <!-- End of .tab-pane -->

                <div class="tab-pane fade" id="product-tab-2" role="tabpanel" aria-labelledby="product-tab-2">
                    <div class="row align-items-center">
                        <div class="col-md-6 order-md-2 text-right">
                            <img src="{{ asset('main/images/products/2.png') }}" alt="product images" class="img-fluid">
                        </div>
                        <!-- End of .col-md-6 -->

                        <div class="col-md-6">
                            <div class="o-details-with-title text-left">
                                <h3>Get Approved</h3>
                                <p>Our Finance department will approve your request</p>
                                <p>send you a confirmatory email</p>
                            </div>
                            <!-- End of .o-details-with-title -->
                        </div>
                        <!-- End of .col-md-6 -->
                    </div>
                    <!-- End of .row -->
                </div>
                <!-- End of .tab-pane -->

                <div class="tab-pane fade" id="product-tab-3" role="tabpanel" aria-labelledby="product-tab-3">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <img src="{{ asset('main/images/products/3.png') }}" alt="product images" class="img-fluid">
                        </div>
                        <!-- End of .col-md-6 -->

                        <div class="col-md-6">
                            <div class="o-details-with-title text-left">
                                <h3>Get Paid</h3>
                                <p>Once your withdrawal has been approved</p>
                                <p>your wallet will be credited with the requested amount</p>
                                <p>All processes will be done at wapspeed</p>
                            </div>
                            <!-- End of .o-details-with-title -->
                        </div>
                        <!-- End of .col-md-6 -->
                    </div>
                    <!-- End of .row -->
                </div>
                <!-- End of .tab-pane -->
            </div>
            <!-- End of .tab-content -->
        </div>
        <!-- End of .product-tab -->
    </div>
    <!-- End of .container -->
</div>
@endsection
