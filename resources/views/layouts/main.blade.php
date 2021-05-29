<div style="margin-top: 80px;"></div>
<script defer src="https://www.livecoinwatch.com/static/lcw-widget.js"></script>
<div class="livecoinwatch-widget-5" lcw-base="USD" lcw-color-tx="#999999" lcw-marquee-1="coins" lcw-marquee-2="movers" lcw-marquee-items="10" style="margin-bottom: 0;"></div>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="zxx">
<!--<![endif]-->



<head>

    <!-- Basic metas
    ======================================== -->
    <meta charset="utf-8">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Mobile specific metas
    ======================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Page Title
    ======================================== -->
    <title>{{ config('app.name') }}</title>

    <!-- links for favicon
    ======================================== -->
    <link rel="shortcut icon" href="{{ asset('main/icon/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('main/icon/favicon.ico') }}" type="image/x-icon">

    <!-- Icon fonts
    ======================================== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/basicons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/crypto-fintech.css') }}">

    <!-- css links
    ======================================== -->
    <!-- Bootstrap link -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/vendor/bootstrap.min.css') }}">

    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/vendor/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/vendor/slick-theme.css') }}">

    <!-- Magnific popup -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/vendor/magnific-popup.css') }}">

    <!-- Custom styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/mainf700.css?v=1.0.1') }}">

    <!-- Responsive styling -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/responsivef700.css?v=1.0.1') }}">
    <script src="{{ asset('main/js/vendor/jquery-3.2.1.min.js') }}"></script>
    <style>
        .logo{
            width: 50px;
            height: 50px;
        }
        .logo-text{
            font-size: 20px;
            margin-left: 10px;
            color:white;
        }
    </style>

</head>


<!-- body starts
============================================ -->

<body>

    <!-- Preloader -->
    <div class="o-preloader">
        <div class="o-preloader_inner"></div>
    </div>

    <!-- Background images -->
    <img class="banner-poly-bg banner-poly-bg-1" src="{{ asset('main/images/banner/banner-polygon-1.png') }}" alt="banner polygon">
    <img class="banner-poly-bg banner-poly-bg-2" src="{{ asset('main/images/banner/banner-polygon-2.png') }}" alt="banner polygon">
    <div class="banner-poly-container banner-poly-bg banner-poly-bg-3">
        <img class="" src="{{ asset('main/images/banner/banner-polygon-3.png') }}" alt="banner polygon">
        <span class="sparks spark-1 ripple-out"></span>
        <span class="sparks spark-2 ripple-out"></span>
        <span class="sparks spark-3 ripple-out"></span>
        <span class="sparks spark-4 ripple-out"></span>
        <span class="sparks spark-5 ripple-out"></span>
    </div>

    <!-- Body-overlay -->
    <div class="body-overlay"></div>

    <!-- navbar starts
============================================ -->
    <nav class="c-onepage-navbar navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand page-scroll" href="{{ route('home.index') }}">
                <img class="logo" src="{{ asset('main/images/logo-alt.jpeg') }}" alt="brand logo">
                 <span class="logo-text"></span>
            </a>
            <div id="google_translate_element" ></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="toggler-icon-bar bar1"></span>
                <span class="toggler-icon-bar bar2"></span>
                <span class="toggler-icon-bar bar3"></span>
            </button>
            <!-- End of .navbar-toggler -->

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto" id="onepage-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.index') }}">Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.about') }}">About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.team') }}">Team
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.plans') }}">Plans
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.wapspeed') }}">Wapspeed
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.contact') }}">Contact
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="btn secondary-btn" href="{{ route('user.login') }}">LOGIN</a>
                    </li>


                </ul>
            </div>
        </div>
        <!-- End of .container -->

    </nav>
    <!-- End of .navbar -->



    <!-- Page-wrapper starts -->
    <div class="page-wrapper crypto-onepage" style="margin-top: 0;">

    @yield('content')

    <!-- c-onepage-footer starts
        ============================================ -->
        <div id="onepage-footer" class="c-onepage-footer  wow fadeIn">
            <div class="footer-content">
                <div class="c-onepage-clients d-flex align-items-center">
                    <div class="container">
                        <div class="c-onepage-clients-slider">
                            <div class="item">
                                <img src="{{ asset('main/images/clients-slider/1.png') }}" alt="clients logo">
                            </div>
                            <!-- End of .item -->

                            <div class="item">
                                <img src="{{ asset('main/images/clients-slider/2.png') }}" alt="clients logo">
                            </div>
                            <!-- End of .item -->

                            <div class="item">
                                <img src="{{ asset('main/images/clients-slider/3.png') }}" alt="clients logo">
                            </div>
                            <!-- End of .item -->

                            <div class="item">
                                <img src="{{ asset('main/images/clients-slider/4.png') }}" alt="clients logo">
                            </div>
                            <!-- End of .item -->

                            <div class="item">
                                <img src="{{ asset('main/images/clients-slider/5.png') }}" alt="clients logo">
                            </div>
                            <!-- End of .item -->

                            <div class="item">
                                <img src="{{ asset('main/images/clients-slider/1.png') }}" alt="clients logo">
                            </div>
                            <!-- End of .item -->

                            <div class="item">
                                <img src="{{ asset('main/images/clients-slider/2.png') }}" alt="clients logo">
                            </div>
                            <!-- End of .item -->
                        </div>
                        <!-- End of .clients-slider -->
                    </div>
                </div>
                <!-- End of .c-onepage-clients -->

                <div class="o-newsletter-form-content">
                    <div class="container">
                        <form action="#" method="POST" class="o-common-card o-newsletter-form">
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <h4>Newsletter</h4>
                                    <p>Sign up for campaign updates.</p>
                                </div>
                                <div class="col-lg-9">
                                    <div class="o-newsletter row">
                                        <div class="col-md">
                                            <input type="text" placeholder="Full Name" name="fname">
                                        </div>
                                        <div class="col-md">
                                            <input type="email" placeholder="Email Address" name="email">
                                        </div>
                                        <div class="col-md-auto">
                                            <button type="submit" class="btn">SUBSCRIBE</button>
                                        </div>
                                    </div>
                                    <!-- End of .o-newsletter -->
                                </div>
                            </div>
                            <!-- End of .row -->
                        </form>
                    </div>
                    <!-- End of .container -->
                </div>
                <!-- End of .o-newsletter-form -->

                <div class="container">
                    <div class="o-footer-nav">
                        <div class="row">
                            <div class="col-md-2">
                                <h6>COMPANY</h6>
                                <ul class="footer-widget">
                                    <li>
                                        <a href="{{ route('home.about') }}">About</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home.team') }}">Team</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home.contact') }}">Contact</a>
                                    </li>
                                </ul>
                                <!-- End of .company-footer-widget -->
                            </div>
                            <div class="col-md-2">
                                <h6>INVESTMENT</h6>
                                <ul class="footer-widget">
                                    <li>
                                        <a href="{{ route('home.plans') }}">Plans</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home.wapspeed') }}">Wapspeed</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('home.why-us') }}">Why us</a>
                                    </li>
                                </ul>
                                <!-- End of .company-footer-widget -->
                            </div>
                            <div class="col-md-4" style="margin-bottom: 20px;">
                                <h6>ABOUT</h6>
                                <div class="o-tweet-widget">
                                    <img src="{{ asset('main/images/twitter-user.jpg') }}" alt="credit card">
                                    <a>Jeson Mendis</a>
                                    <p>"Hynet Is A Leading Cryptocurrency Trading Group That Utilizes Innovative Proprietary Technologies To Provide Managed Cryptocurrency Trading Services To Yield Higher Profits."</p>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <h6>WE ACCEPT CRYPTO AND FIAT CURRENCIES</h6>
                                <div class="footer-widget o-credit-cards">
                                    <img src="{{ asset('main/images/credit-cards/1.jpg') }}" alt="credit card">
                                    <img src="{{ asset('main/images/credit-cards/2.jpg') }}" alt="credit card">
                                    <img src="{{ asset('main/images/credit-cards/3.jpg') }}" alt="credit card">
                                    <img src="{{ asset('main/images/credit-cards/4.jpg') }}" alt="credit card">
                                </div>
                            </div>
                        </div>
                        <!-- End of .row -->
                    </div>
                    <!-- End of .o-footer-nav -->

                    <div class="o-footer-bottom">
                        <div class="row no-gutters">
                            <div class="col-md">
                                <p class="copyright-txt">Copyright &copy; <?= date('Y'); ?>. All rights reserved by
                                    <a href="{{ env('APP_URL') }}"> {{ config('app.name') }}</a>.</p>
                            </div>
                            <div class="col-md-3">
                                <div class="o-follow-us text-md-center">
                                    <a href="www.facebook.html" target="_blank" rel="noopener">
                                        <i class="icon-Facebook"></i>
                                    </a>
                                    <a href="www.linkedin.html" target="_blank" rel="noopener">
                                        <i class="icon-Linkedin"></i>
                                    </a>
                                    <a href="www.medium.html" target="_blank" rel="noopener">
                                        <i class="icon-Medium"></i>
                                    </a>
                                    <a href="www.twitter.html" target="_blank" rel="noopener">
                                        <i class="icon-Twitter2"></i>
                                    </a>
                                </div>
                                <!-- End of .o-follow-us -->
                            </div>
                            <div class="col-md">
                                <div class="o-terms-privacy text-right">
                                    <a href="#" data-toggle="modal" data-target="#terms-modal"> Terms &amp; Conditions</a>
                                </div>
                                <!-- End of .o-terms-privacy -->
                            </div>
                        </div>
                        <!-- End of .row -->
                    </div>
                    <!-- End of .footer-bottom -->
                </div>
                <!-- End of .container -->
            </div>
            <!-- End of .footer-content -->
        </div>
        <!-- End of .c-onepage-footer -->


    </div>
    <!-- End of .page-wrapper -->


    <!-- Blog Modal -->

    <div class="modal fade o-blog-modal c-onepage-modal" id="blog-modal-content" tabindex="-1" role="dialog" aria-labelledby="blog-modal-content"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="icon-Cross3"></i>
                    </button>

                    <div class="img-container">
                        <img src="{{ asset('main/images/blog/blog-modal.jpg') }}" alt="blog modal image" class="img-fluid">
                    </div>
                    <!-- End of .img-container -->
                    <div class="post-details">
                        <a href="#">March 10, 2018</a>
                        <a href="#">Jeson Pool</a>
                    </div>
                    <!-- End of .End of .post-details -->

                    <h2 class="modal-heading">Bitcoin still consolidating above 200 SMA!</h2>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                        Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor
                        at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur,
                        from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered
                        the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum
                        et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise
                        on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem
                        ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                    <h2>Lorem Ipsum is simply dummy text of</h2>
                    <p>Pellentesque auctor, nibh sit amet rhoncus sollicitudin, lorem dolor fringilla sapien, at condimentum
                        metus purus a lectus. Pellentesque sed interdum libero, vel vehicula dolor. Proin eget sagittis ex.
                        Donec porta libero in purus semper. Ut malesuada justo condimentum. Sed porta egestas dui sed tempus.
                    </p>
                    <h3>Tthe printing and typesetting industry.</h3>
                    <p>Pellentesque auctor, nibh sit amet rhoncus sollicitudin, lorem dolor fringilla sapien, at condimentum
                        metus purus a lectus. Pellentesque sed interdum libero, vel vehicula dolor. Proin eget sagittis ex.
                        Donec porta libero in purus semper. Ut malesuada justo condimentum. Sed porta egestas dui sed tempus.
                    </p>
                </div>
                <!-- End of .modal-body -->
            </div>
            <!-- End of .modal-content -->
        </div>
        <!-- End of .modal-dialogue -->
    </div>
    <!-- End of .modal -->

        <!-- how it works modal -->


<div class="modal fade o-terms-modal c-onepage-modal" id="how-it-works-modal" tabindex="-1" role="dialog" aria-labelledby="terms-modal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="icon-Cross3"></i>
                    </button>
                    <h2 class="modal-heading">How it works</h2>
                    <h3>1. Lorem Ipsum is simply dummy text of</h3>
                    <p>Pellentesque auctor, nibh sit amet rhoncus sollicitudin, lorem dolor fringilla sapien, at condimentum
                        metus purus a lectus. Pellentesque sed interdum libero, vel vehicula dolor. Proin eget sagittis ex.
                        Donec porta libero in purus semper. ut malesuada justo condimentum. Sed porta egestas dui sed tempus.
                    </p>
                    <h3>2. The printing and typesetting industry.</h3>
                    <p>Pellentesque auctor, nibh sit amet rhoncus sollicitudin, lorem dolor fringilla sapien, at condimentum
                        metus purus a lectus. Pellentesque sed interdum libero, vel vehicula dolor. Proin eget sagittis ex.
                        Donec porta libero in purus semper. ut malesuada justo condimentum. Sed porta egestas dui sed tempus.
                    </p>
                    <h3>3. Tthe printing and typesetting industry.</h3>
                    <ul class="common-list">
                        <li>Pellentesque auctor, nibh sit amet rhoncus sollicitudin</li>
                        <li>Lorem dolor fringilla sapien, at condimentum metus purus a lectus</li>
                        <li>Pellentesque sed interdum libero, vel vehicula dolor. Proin eget sagittis ex</li>
                        <li>Donec porta libero in purus semper.</li>
                    </ul>
                    <h3>4. Lorem Ipsum has been the industry's standard dummy text ever since . </h3>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                        Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor
                        at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur,
                        from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered
                        the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum
                        et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise
                        on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem
                        ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                    <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections
                        1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact
                        original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                </div>
                <!-- End of .modal-body -->
            </div>
            <!-- End of .modal-content -->
        </div>
        <!-- End of .modal-dialogue -->
    </div>

        <!-- end of how it works modal -->

    <!-- Terms and Conditions Modal -->

    <div class="modal fade o-terms-modal c-onepage-modal" id="terms-modal" tabindex="-1" role="dialog" aria-labelledby="terms-modal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="icon-Cross3"></i>
                    </button>
                    <h2 class="modal-heading">Terms &amp; Conditions</h2>
                    <hr>

<div class="row container-fluid">
    <div class="col-12 col-lg-12">
        <p>By using our website, and communicating with us via email or other electronic messages (collectively, “Digital Presence”), you consent to: (1) the collection, use, and storage of your personal and non-personal information, and (2) the Terms & Conditions of Use below, which includes our Privacy & Security Statement. We may amend these Terms and Conditions from time to time; if we do, we will post those changes on this page within a reasonable time after the change.</p>
        <br>
        <p>Depending on your interaction with Northern Hedge Fund, other privacy policies may apply in addition to these Terms & Conditions.</p>
        <br>
        <p>Trademarks and Copyrights</p>
        <br>
        <p>The materials on this Digital Presence are copyrighted and protected by worldwide copyright laws and treaty provisions. Any unauthorized use of these materials may violate copyright, trademark, and other laws. Materials on this Digital Presence may not be copied, reproduced, modified, published, uploaded, posted, transmitted, or distributed in any way without the prior written permission of the Digital Presence host. Except as expressly provided, the Digital Presence host does not grant any express or implied right to you under any patents, copyrights, trademarks, or trade secrets.</p>
        <br>
        <p>No Warranties</p>
        <br>
        <p>Although the Digital Presence host has attempted to provide accurate information on this Digital Presence, it assumes no responsibility for the accuracy of the information. The Digital Presence host makes no representations or warranties on this Digital Presence with respect to its product or service offerings. Information regarding products or services offerings contained on this Digital Presence, including but not limited to information regarding features and benefits, technical information, or other similar information contained in documentation available on or from this Digital Presence, shall not be incorporated or integrated into any Digital Presence host warranty or other contractual right, privilege, or obligations otherwise provided under the terms of any agreement with the Digital Presence host. The Digital Presence host may make changes to the materials or products described in this Digital Presence at any time, without notice. The Digital Presence host makes no commitment to update these materials.</p>
        <br>
        <p>All information provided on this digital presence is provided to you on an “as is” basis, without warranty of any kind either express or implied, including but not limited to the implied warranties of merchantability, fitness for a particular purpose, and non-infringement. The digital presence host makes no warranty as to the accuracy, completeness, currency, or reliability of any content available through this digital presence. You are responsible for verifying any information before relying on it. Use of this digital presence and the content available on this digital presence is at your sole risk. The digital presence host makes no representations or warranties that use of this digital presence will be secure, uninterrupted or error-free. You are responsible for taking all necessary precautions to ensure that any content you may obtain from this digital presence is free of viruses.</p>
        <br>
        <p>Limitation of Liability</p>
        <br>
        <p>The digital presence host specifically disclaims any liability, whether based in contract, tort, strict liability, or otherwise, for any direct, indirect, incidental, consequential, or special damages arising out of or in any way connected with access to or use of this digital presence, even if the digital presence host has been advised of the possibility of such damages, including but not limited to reliance by any party on any content obtained through the use of this digital presence, whether caused in whole or in part by negligence, acts of god, telecommunications failure, theft or destruction of or unauthorized access to this digital presence, or related information or programs.</p>
        <br>
        <p>Content of Materials</p>
        <br>
        <p>The materials on this Digital Presence have protected information. This means it cannot be used or copied without the owner’s written consent. In most cases the owner is the Digital Presence host. In some cases the owner is a third party.</p>
        <br>
        <p>Links to other website</p>
        <br>
        <p>Certain links in this websites will lead you to other affiliated websites, which is subjected to their own Terms and Conditions. Other links may lead you to websites which are not under the control of Northern Hedge Fund. When you activate any of these you leave Northern Hedge Fund. Northern Hedge Fund accepts no responsibility or liability for contents of any other site to which a hypertext links exist and gives no representation or warranty (expressed or implied) as to the information on such sites.</p>
        <br>
        <p>Privacy and Security Statement</p>
        <br>
        <p>The Digital Presence host is committed to protecting the privacy of its customers and others who visit our website, or send us information via email. The Privacy and Security Statement below outlines how we collect and use information. It also tells you what to do if you do not want your personal information collected.</p>
        <br>
        <p>Personal Information and Privacy</p>
        <br>
        <p>
            Each time you visit our Digital Presence, our web server automatically recognizes and gathers non-personally identifying information such as but not limited to your computer’s IP address, browser software, operating system, pages viewed, and duration of your visit. This information is not linked to any personally identifiable information (“PII”).
            <br>
            In addition to information automatically collected we may also collect through surveys or questionnaires PII such as email addresses, name and address, telephone number; and customer-specific identifiers such as ID, TIN, etc. In cases where PII is collected the Digital Presence host takes precautions to ensure the security of this information.
            <br>
            The information we collect is used to help us better understand how visitors utilize the site and enhance the overall Digital Presence experience. It is also used to notify customers about updates to our Digital Presence, and is shared only with agents or contractors to assist in providing support for our internal operations. The information is disclosed when we are legally required to do so, which may be at the request of governmental authorities conducting an investigation to verify or enforce compliance with the policies governing our Digital Presence and applicable laws, or to protect against misuse or unauthorized use of our Digital Presence. The information also may be provided to a successor entity in connection with a corporate merger, consolidation, sale of assets, or other corporate change respecting the Digital Presence.
        </p>
        <br>
        <p>Cookies</p>
        <br>
        <p>
            Certain features of this site may require the use of cookies. A “cookie” is a method to pass information between the server and your web browser when you travel from web page to web page. Cookie information is stored on your hard drive in a special directory created when you installed your web browser. This information can only be read by the website that created it. No other website can access this information. No PII is stored in the cookies this site creates.
            <br>
            Most web browsers can be configured to reject cookies, or to notify you if a cookie is sent to you. If you are not sure whether your web browser has these capabilities you should contact the software manufacturer or your Internet service provider. If a user rejects a cookie, certain areas of the website may not function properly. The affected areas may include but are not limited to the following: inability to access certain areas of the website, inconvenience of having to enter personal information more often, and navigation ability throughout the website.
            <br>
            We may use third-party web analytics service providers that use cookies or other website technologies to help us analyze both how users use this website and the effectiveness of our marketing search terms. The information generated by the cookie about your use of this website (including, without limitation, your IP address) would be transmitted to and stored by this service provider. They will use this information to evaluate your use of our website and compile aggregated reports for us. The information that our service providers collect and provide to us is not personally identifiable.
        </p>
        <br>
        <p>Third-Party Links</p>
        <br>
        <p>This Digital Presence contains links to other sites that may be helpful to our clients. The Digital Presence host provides these links for your convenience and is not responsible for the accuracy or completeness of these external sites. The Digital Presence host is not responsible for the content or privacy practices of external sites and encourages you to review the privacy policies of those sites before you use them.</p>
    </div>
</div>
                </div>
                <!-- End of .modal-body -->
            </div>
            <!-- End of .modal-content -->
        </div>
        <!-- End of .modal-dialogue -->
    </div>
    <!-- End of .modal -->


    <!-- Privacy Modal -->


    <!-- End of .modal -->


    <!-- Javascripts
    ======================================= -->

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/6030172f918aa2612740ab0d/1euvh6nse';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->

		<script type="text/javascript">
			function googleTranslateElementInit() {
				new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
			}
		</script>

		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <!-- jQuery -->

    <script src="{{ asset('main/js/vendor/jquery-migrate.min.js') }}"></script>
    <!-- jQuery Easing Plugin -->
    <script src="{{ asset('main/js/vendor/easing-1.3.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('main/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <!-- font awesome -->
    <script src="{{ asset('main/js/vendor/fontawesome-all.min.js') }}"></script>
    <!-- jQuery Countdown plugin -->
    <script src="{{ asset('main/js/vendor/jquery.countdown.min.js') }}"></script>
    <!-- jQuery progressbar plugin -->
    <script src="{{ asset('main/js/vendor/jquery.waypoints.min.js') }}"></script>
    <!-- Bootstrap Progressbar -->
    <script src="{{ asset('main/js/vendor/bootstrap-progressbar.min.js') }}"></script>
    <!-- ImagesLoaded js -->
    <script src="{{ asset('main/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Slick carousel js -->
    <script src="{{ asset('main/js/vendor/slick.min.js') }}"></script>
    <!-- Magnific popup -->
    <script src="{{ asset('main/js/vendor/jquery.magnific-popup.min.js') }}"></script>
    <!-- Charts -->
    <script src="{{ asset('main/js/vendor/amcharts.min.js') }}"></script>
    <script src="{{ asset('main/js/vendor/pie.min.js') }}"></script>
    <!-- Bitcoin -->
    <script src="{{ asset('main/js/vendor/widget.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset('main/js/vendor/wow.min.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('main/js/main.js') }}"></script>
    <script>
        (function(b,i,t,C,O,I,N) {
          window.addEventListener('load',function() {
            if(b.getElementById(C))return;
            I=b.createElement(i),N=b.getElementsByTagName(i)[0];
            I.src=t;I.id=C;N.parentNode.insertBefore(I, N);
          },false)
        })(document,'script',"{{ asset('" + 'widgets.bitcoin.com/widget.js','btcwdgt');
      </script>
    <!-- Google map -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6Cn2XCz3_n_J57QSN_rw6gwtQDWQJ3MM&amp;callback=initMap">
    </script>

</body>



</html>
