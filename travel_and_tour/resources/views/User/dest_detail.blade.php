@extends('User.master')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" id="background-img" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate pb-5 text-center">
				<h1 class="mb-3 bread">Destination</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="{{ route('destination.index') }}">Destination <i class="ion-ios-arrow-forward"></i></a></span><span class="mr-2">Detail</span></p>
			</div>
		</div>
	</div>
</section>

<!-- main start -->
<!-- start MAIN start Popular Destination -->
<!-- End Popular Destination -->

<!-- Start Our Destination -->
<br>
<section class="ftco-section ftco-no-pt">
	<div class="container">

		<!-- start of slide show -->
		<div class="slideshow-container">
			<!-- Full-width images with number and caption text -->
			<?php $some = json_decode($destination->image); ?>

			@if(!empty($some))
			<?php
			for ($i=0; $i<count($some); $i++) {
				?>
				<div class="mySlides mx-auto">
					<center><img src='{{ asset("/storage/images/destination/".$destination->id."/$some[$i]")}}' id='des-img' alt="image"></center>
				</div>
			<?php } ?>
			@else
			<center> <img src='{{ asset("../goldenland/images/t2.jpg")}}'class="img" id='des-img'  alt="image"></center>
			@endif
			<!-- Next and previous buttons -->
			<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			<a class="next" onclick="plusSlides(1)">&#10095;</a>

			<!-- The dots/circles -->
			<center>
				<div>
					<?php $some = json_decode($destination->image); ?>
					@if(!empty($some))
					<?php
					for ($i=0; $i<count($some); $i++) {
						?>
						<span class="dot" onclick="currentSlide(<?=$i+1?>)" ></span>
					<?php } ?>
					@else
						<span class="dot" onclick="currentSlide(1)" ></span>
					@endif
				</div>
			</center>
		</div>
		<!-- end of slide show -->

		<!-- image gallery -->
		<div class="row" >
			<div  class="dest"></div>
			<?php $some = json_decode($destination->image);?>
			@if(!empty($some))
			<?php
			for ($i=0; $i<count($some); $i++) {
				?>
				<center>
					<img src='{{ asset("/storage/images/destination/".$destination->id."/$some[$i]")}}' width="175" height="100" alt="image">
				</center>
			<?php } ?>
			@else
			<center> <img src='{{ asset("../goldenland/images/t2.jpg")}}' class="img"  width="175" height="100" alt="image"></center>
			@endif
		</div><br>

		<!-- Jumbotron -->
		<div class="jumbotron">
			<h4 class="my-4 text-center">About {{ $destination->name }}</h4>
			<p class="text-center my-4">City : {{ $destination->city }}</p>
			<p class="text-center my-4">Division : {{ $destination->division }}</p>
			<p class="text-center my-4" id="word">Description:{{ $destination->description }}</p>
			<center>
				<a href="{{ route('package.indexById',$destination->id) }}" class="btn btn-primary">
					Packages</a>
					<a href="{{ route('destination.index') }}" class="btn btn-primary">
						Cancel</a>
					</center>
				</div>
			</div>
		</section>

		<!-- end MAIN End Our Destination -->
		<!-- end main -->

		@endsection
