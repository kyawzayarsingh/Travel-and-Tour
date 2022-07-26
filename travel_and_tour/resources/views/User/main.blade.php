<!-- start MAIN start Popular Destination -->
@extends('User.master')
@section('content')
@include('User.content22')
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center pb-4">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h2 class="mb-4">Popular Destinations</h2>
			</div>
		</div>
		<div class="row">
			@foreach($popularDestinations as $index => $popularDestination)
			@if($index < 4 )
			<div class="col-md-3 ftco-animate">
				<a href="{{ route('destination.detail', $popularDestination->id ) }}">
					<div class="project-destination pos">
						<?php $some = json_decode($popularDestination->image);?>
						@if(!empty($some))
						<img src='{{ asset('/storage/images/destination/'.$popularDestination->id.'/'.$some[0])}}'class="img">
						@else
						<img src='{{ asset('../goldenland/images/t2.jpg')}}'class="img">
						@endif
						<div class="rel">
							<h3 class="text-warning">{{ $popularDestination->name }}</h3>
						</div>
						<span>{{ $popularDestination->guest_no}} Guests</span>
					</div>
				</a>
			</div>
			@endif
			@endforeach
		</div>
	</section>s
	<!-- End Popular Destination -->

	<!-- Start Our Destination -->
	<section class="ftco-section ftco-no-pt">
		<div class="container">
			<div class="row justify-content-center pb-4">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h2 class="mb-4">Tour Destinations</h2>
				</div>
			</div>

			<div class="row">
				@foreach($destinations as $destination)

				<div class="col-md-4 ftco-animate">
					<div class="project-wrap">
						<?php $some = json_decode($destination->image);  ?>
						@if(!empty($some))
						<img src='{{ asset("/storage/images/destination/".$destination->id."/$some[0]")}}'class="img">
						@else
						<img src='{{ asset("../goldenland/images/t2.jpg")}}'class="img">
						@endif
						<div class="text p-4">
							<a href="{{ route('package.indexById',$destination->id) }}"><span class="price">Packages</span></a>
							<span class="days">Division : {{ $destination->division }}</span><br>
							<span>City : {{ $destination->city }}</span>
							<h2>{{ $destination->name }}</h2>
							<div class="fix">{{ $destination->description }}</div>
							<a href="{{ route('destination.detail', $destination->id ) }}">View More</a>
						</div>
					</div>
				</div>

				@endforeach
			</div>

			<div class="row mt-3">
				<div class="col text-center">
					<div class="block-27 pagination justify-content-center ">
						{!! $destinations->links() !!}
					</div>
				</div>
			</div>

		</div>
	</section>
	<!-- end MAIN End Our Destination -->
	@endsection
