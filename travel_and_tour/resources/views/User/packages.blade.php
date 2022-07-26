@extends('User.master')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" id="background-img" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate pb-5 text-center">
				<h1 class="mb-3 bread">Packages</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="{{ route('userHome.index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="{{ route('destination.index') }}">Destination <i class="ion-ios-arrow-forward"></i></a></span><span>Packages</span></p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row d-flex">
			@foreach($packages as $package)
			<div class="col-md-4 ftco-animate">
				<div class="project-wrap">
					@foreach($destinations as $destination)
						@if($destination->id == $package->destination_id)
							<?php $some = json_decode($destination->image);  ?>
							@if(!empty($some))
							<img src='{{ asset("/storage/images/destination/".$destination->id."/$some[0]")}}'class="img">
							@else
							<img src='{{ asset("../goldenland/images/t2.jpg")}}'class="img">
							@endif
						@endif
					@endforeach
					<div class="text p-4">
						<a href="{{ route('show.detail',$package->id) }}"><span class="price">More Detail</span></a>
						<h5>{{ $package->price}}</h5>
						<h3><a href="#">{{ $package->name}}</a></h3>
						<div class="fix">
							<p class="location"></span>{{$package->description}}</p>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection
