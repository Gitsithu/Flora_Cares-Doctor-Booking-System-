<!DOCTYPE html>
<html lang="en">
<head>
	<title>Flora Cares</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/frontend/css/animate.css">
	<link rel="stylesheet" href="/frontend/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/frontend/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="/frontend/css/magnific-popup.css">
	<link rel="stylesheet" href="/frontend/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="/frontend/css/jquery.timepicker.css">
	<link rel="stylesheet" href="/frontend/css/flaticon.css">
	<link rel="stylesheet" href="/frontend/css/style.css">
	<style>
	@media only screen and (min-width: 1100px) {
  	#spa{
    margin-left:25%!important;
  	}
	}
	@media (min-width: 750px) and (max-width: 1095px)  {
  	#spa{
    margin-left:18%!important;
  	}
}
</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand d-flex align-items-center" href="/"><span class="flaticon flaticon-stethoscope"></span><h1>Flora Cares<span class="mini">Flora Cares</span></h1></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="/clinic" class="nav-link">Clinic</a></li>
					<li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
					<li class="nav-item"><a href="/about" class="nav-link">About</a></li>
					
                             
                            
					@if(Auth::check())
					<li class="nav-item"><a href="/frontend/feedback" class="nav-link">Feedback</a></li>
					<li class="nav-item"><a href="/token" class="nav-link">Appointments</a></li>
					<li class="nav-item"><a href="/appointment" class="nav-link">History</a></li>
					@else
					@endif
                    @guest
                    <li class="nav-item cta" style="margin-left:10px;"><a href="{{ route ('login') }}" class="nav-link">Login</a></li>
              @if (Route::has('register'))
              <li class="nav-item cta" style="margin-left:10px;"><a href="{{ route ('register') }}" class="nav-link">Register</a></li>
              @endif
              @else
                                <div class="login-state d-flex align-items-center">
								<div class="userthumb">
                                <img src="{{ Auth::user()->image }}" width="40px" height="40px" style="border-radius:50%; margin-top:5px;">
                                </div>
                                <div class="user-name mr-30">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="userName" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:26px;">{{ Auth::user()->name }}</a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userName">
                                            <a class="dropdown-item" href="/home">Profile</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>   
                                      </div>
                                    </div>
									
                                </div>
                                
                            </div>
                            <!-- Register / Login -->
                            @endguest  

                              


					

				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->