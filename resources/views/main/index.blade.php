@extends('layouts.main')

@section('content')
        <!-- banner starts
        ============================================ -->
        <div id="banner" style="padding: 0;" class="section c-onepage-banner d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md">
                        <div class="banner-txt">
                            <h1>Fastest Growing Agency for
                                <br>Crypto Investors</h1>
                            <p>Just because you call something a blockchain or an ICO, that
                                <br>doesn't mean you aren't subject to normal laws . . . <a href="{{ route('home.about') }}" class="btn"> read more</a>
                            </p>

                        </div>

                        <!-- End of .banner-txt -->

                    </div>

                    <!-- End of .col-md -->

                    <div class="col-md">
                        <div class="countdown-box ml-md-auto">
                            <h4>Market Cap</h4>
                            <div class="countdown">
                                <div id="clock"></div>
                                <div class="progress">
                                    <div class="progress-bar" data-transitiongoal="35"></div>
                                </div>
                                <!-- End of .progress -->
                                <p>$11,087,890 Market cap</p>
                                <a href="{{ route('user.register') }}" class="btn secondary-btn">Make a move</a>
                            </div>
                            <!-- End of .countdown -->
                        </div>
                        <!-- End of .countdown-box -->
                        <div class="radial-bg"></div>
                    </div>
                    <!-- End of .col-md -->
                </div>
                <!-- End of .row -->
            </div>
            <!-- End of .container -->


        </div>
        <!-- End of .banner -->

<!-- c-onepage-roadmap starts
        ============================================ -->
        <div id="roadmap" class="section c-onepage-roadmap  wow fadeIn">
            <div class="container">
                <h2 class="section-title text-center">Plans</h2>
                <p class="section-subtitle text-center">
                Our Flexible Investment Plans
                </p>

                <div class="o-roadmap">
                    <!-- <div class="pivot-line"></div> -->
                    <div class="row">
                    @forelse ($plans as $plan)
                        <div class="col-12 text-center">
                            <div class="roadmap-box">
                                <div class="o-common-card">
                                    <h5 class="text-center">
                                        {{ $plan->name }}
                                    </h5>
                                    <p>
                                        {{ $plan->description }}
                                    </p>
                                    <img src="{{ asset('main/images/roadmap/1.jpg') }}" alt="roadmap image">
                                    <a href="#" class="move-down">
                                        <i class="icon-Move"></i>
                                    </a>

                                    <div class="collapse-txt">
                                        <p> {{ $plan->desciption }} </p>
                                        <p>${{ $plan->min }} - ${{ $plan->max }}</p>
                                    </div>
                                    <!-- End of .collapse-txt -->
                                </div>
                                <!-- End of .o-common-card -->
                            </div>
                            <!-- End of .roadmap-box -->
                        </div>
                        <!-- End of .col-md-6 -->
                        @empty
                            <h1>No plans Available</h1>
                        @endforelse
                    </div>
                    <!-- End of .row -->
                </div>
                <!-- End of .o-roadmap -->
            </div>
            <!-- End fo .container -->
        </div>
        <!-- End of .c-onepage-roadmap -->


        <div style="height:433px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #56667F; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; box-sizing:content-box; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #56667F; padding: 0px; margin: 0px; width: auto;">
            <div style="height:413px;">
                <iframe src="https://widget.coinlib.io/widget?type=full_v2&theme=light&cnt=6&pref_coin_id=1505&graph=yes" width="100%" height="409" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe>
            </div>
        </div>

@endsection
