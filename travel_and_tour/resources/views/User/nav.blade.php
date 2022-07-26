<?php
namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand navbar-light" href="{{ route('userHome.index') }}">Golden Land<span>Travel Agency</span></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		</button>

		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"><a href="{{ route('userHome.index') }}" class="nav-link">Home</a></li>
				<li class="nav-item"><a href="{{ route('about.index') }}" class="nav-link">About</a></li>
				<li class="nav-item"><a href="{{ route('destination.index') }}" class="nav-link">Destination</a>
				<li class="nav-item"><a href="{{ route('contact.index') }}" class="nav-link">Contact</a></li>

				@if(Auth::check() and Auth::user()->type==1)
				<li class="nav-item"><a href="{{ route('booking.index') }}" class="nav-link">Booking</a></li>
				<li class="nav-item"><a href="{{ route('profile.index') }}" class="nav-link">Profile</a></li>
				<li class="nav-item"><a href="{{ route('user.logout') }}" class="nav-link">Log Out</a></li>
				@else
				<li class="nav-item"><a href="{{ route('signIn.index') }}" class="nav-link">Sign in</a></li>
				@endif
			</ul>
		</div>
	</div>
</nav>
