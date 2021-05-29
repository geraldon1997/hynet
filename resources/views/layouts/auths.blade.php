<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>{{ config('app.name') }} | Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="{{ asset('assets/css/ready.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/font-awesome-4.7.0/css/font-awesome.css') }}">
    <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>

    <style>
        .main-panel{
            width: 100%;
        }
    </style>
</head>
<body>
	<div class="wrapper">
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                            <div class="card">
                                <div class="card-header text-center">
                                <div class="card-title">
                                    <a href="{{ route('home.index') }}">
                                        <img src="{{ asset('main/images/logo-alt.jpeg') }}" alt="" width="50">
                                    </a>
                                </div>
                                <h4 class="card-title">{{ $page }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <x-alert />
                                </div>
                                 @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
		    </div>
				<footer class="footer" style="margin-bottom: 0 !important;">
					<div class="container-fluid">
						<nav class="pull-left">
						</nav>
						<div class="copyright ml-auto">
							Copyright &copy; {{ config('app.name') }} <script>document.write(new Date().getFullYear());</script> All rights reserved <i class="la la-heart heart text-success"></i> by <a href="{{ route('user.dashboard') }}">{{ config('app.name') }}</a>
						</div>
					</div>
				</footer>
		</div>
	</div>
    <script src="//code.tidio.co/nxvtxwnkakz0foshjqnfqw6q2jhgpmd5.js"></script>
</body>
<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/chartist/chartist.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-mapael/maps/world_countries.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/ready.min.js') }}"></script>
<script src="{{ asset('assets/js/demo.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</html>
