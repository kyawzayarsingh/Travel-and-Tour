@extends('User.master')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" id="background-img" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate pb-5 text-center">
				<h1 class="mb-3 bread">Contact</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="{{ route('userHome.index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span><span class="mr-2">Contact</span></p>
			</div>
		</div>
	</div>
</section>

<!-- main start -->
<section class="ftco-section ftco-no-pb contact-section">
	<div class="container">
		<div class="row d-flex contact-info">
			<div class="col-md-3 d-flex">
				<div class="align-self-stretch box p-4 text-center">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="icon-map-signs"></span>
					</div>
					<h3 class="mb-2">Address</h3>
					<p>122/124 1F, 4th Quarter, Botahtaung Pagoda Rd, Yangon</p>
				</div>
			</div>
			<div class="col-md-3 d-flex">
				<div class="align-self-stretch box p-4 text-center">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="icon-phone2"></span>
					</div>
					<h3 class="mb-2">Contact Number</h3>
					<p>+95 1 203853</p>
				</div>
			</div>
			<div class="col-md-3 d-flex">
				<div class="align-self-stretch box p-4 text-center">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="icon-paper-plane"></span>
					</div>
					<h3 class="mb-2">Email Address</h3>
					<p>goldenland.travelagency@gmail.com</p>
				</div>
			</div>
			<div class="col-md-3 d-flex">
				<div class="align-self-stretch box p-4 text-center">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="icon-globe"></span>
					</div>
					<h3 class="mb-2">Website</h3>
					<p>GoldenLand.com</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section contact-section">
	<div class="container">
		<div class="row block-9">
			<div class="col-lg-10 container">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15280.363621519431!2d96.172634!3d16.7721523!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xaaa95d12ca7d8d30!2sSeattle%20Consulting%20Myanmar%20Co.%2CLtd!5e0!3m2!1smy!2smm!4v1597204018882!5m2!1smy!2smm" width=100% height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
		</div>
	</div>
</section>
@endsection
