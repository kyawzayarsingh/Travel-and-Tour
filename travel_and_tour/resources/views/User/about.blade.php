@extends('User.master')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" id="background-img" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate pb-5 text-center">
				<h1 class="mb-3 bread">About</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="{{ route('userHome.index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span><span>About</span></p>
			</div>
		</div>
	</div>
</section>

<!-- main start -->
<br>
<section class="ftco-counter img" id="section-counter">
	<div class="container">
		<div class="row d-flex">
			<div class="col-md-6 d-flex">
				<div class="img d-flex align-self-stretch" id="side-img"></div>
			</div>
			<div class="col-md-6 pl-md-5 py-5">
				<div class="row justify-content-start pb-3">
					<div class="col-md-12 heading-section ftco-animate">
						<h3 class="mb-4 font-weight-bold">Make Your Tour Memorable and Safe With Us</h3>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;GoldenLand Myanmar Travel & Tours Agency was founded in 2020. Our agency provides all tourism related services and became one of the leading inbound tour operator and professional travel agency in Myanmar.</p>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;We have our own vehicles for tourists and we take care of ground transportation . By using our own vehicle, we can also definitely reduce operational costs & service turnaround time.</p>
						<p class="font-weight-bold">Please you  contact with us if you want to go secure and comfortable journey.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<br>
	<!-- end main -->
	@endsection
