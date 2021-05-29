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
        th, td{
            white-space: nowrap;
        }
    </style>
</head>
<body>
	<div class="wrapper">

        <div class="main-header">
			<div class="logo-header">
				<a href="{{ route('user.dashboard') }}" class="logo">
                {{ config('app.name') }}
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">

					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"><span> {{ auth()->user()->username ? auth()->user()->username : 'Guest' }} </span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
                                <style>
                                    #logout-button:hover{
                                        cursor: pointer;
                                    }
                                </style>
									<span id="logout-button" onclick="event.preventDefault(); $('#user-logout').submit();" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</span>
                                    <form action="{{ route('user.logout') }}" method="post" id="user-logout">
                                        @csrf
                                    </form>
                                </li>
							</ul>
								<!-- /.dropdown-user -->
						</li>
					</ul>
				</div>
            </nav>
			</div>


			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<span class="fa fa-user" style="color: orange; margin-left: 5px; font-size: 45px;"></span>
						</div>
						<div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<span class="user-level">
                                        {{auth()->user()->fullname}}
                                        <br>
                                        <b style="color: green;">
                                        @if (isAdmin())
                                            Admin
                                        @else
                                            Investor
                                        @endif
                                        </b>

                                    </span>
								</span>
							</a>
							<div class="clearfix"></div>


						</div>
					</div>
					<ul class="nav">
						<li class="nav-item">
							<a href="{{ route('user.dashboard') }}">
								<i class="la la-dashboard"></i>
								<p>Dashboard</p>
							</a>
						</li>
                        @if (isAdmin())
						<li class="nav-item">
							<a href="{{ route('user.index') }}">
								<i class="la la-user-plus"></i>
								<p>Users</p>
							</a>
						</li>
                        <li class="nav-item">
							<a href="{{ route('paymentmethod.index') }}">
								<i class="la la-credit-card"></i>
								<p>Payment Methods</p>
							</a>
						</li>
                        <li class="nav-item">
							<a href="{{ route('plans.index') }}">
								<i class="la la-cart-plus"></i>
								<p>Plans</p>
								<!-- <span class="badge badge-success">6</span> -->
							</a>
						</li>
                        <li class="nav-item">
							<a href="{{ route('withdrawalmethod.index') }}">
								<i class="la la-sort-amount-asc"></i>
								<p>Withdrawal methods</p>
								<!-- <span class="badge badge-success">6</span> -->
							</a>
						</li>
                        @endif

                        <li class="nav-item">
							<a href="{{ route('deposit.create') }}">
								<i class="la la-external-link"></i>
								<p>Make Deposit</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('deposit.index') }}">
								<i class="la la-list"></i>
								<p>Deposit History</p>
							</a>
						</li>
                        <li class="nav-item">
							<a href="{{ route('account.index') }}">
								<i class="la la-money"></i>
								<p>Account</p>
								<!-- <span class="badge badge-success">6</span> -->
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('user.referrals') }}">
								<i class="la la-link"></i>
								<p>Referrals</p>
								<!-- <span class="badge badge-count">3</span> -->
							</a>
						</li>
                        <li class="nav-item">
							<a href="{{ route('withdrawal.index') }}">
								<i class="la la-sort-amount-asc"></i>
								<p>Withdrawal History</p>
								<!-- <span class="badge badge-success">6</span> -->
							</a>
						</li>
					</ul>
				</div>
			</div>
        <div class="main-panel">

		<div class="content">
			<div class="container-fluid">
            <x-alert />
				@yield('content')
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
