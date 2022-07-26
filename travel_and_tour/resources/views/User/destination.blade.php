@extends('User.master')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" id="background-img" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate pb-5 text-center">
				<h1 class="mb-3 bread">Destination</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="{{ route('userHome.index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span><span class="mr-2">Destination</span></p>
			</div>
		</div>
	</div>
</section>

<br>
<section class="ftco-section ftco-no-pt">
	<div class="overlay"></div>
	<div class="container">

		<div class="row">
			<div class="sidebar-box pt-md-5">
				<center>
					<form action="{{ route('destination.search') }}" class="p-5 bg-light" method="post" id="frm_search">
						@csrf
						<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							<input type="text" name="name" id="name" class="col-md-3" placeholder="Place Names" value="{{ request()->input('name') }}">
							&nbsp;&nbsp;&nbsp;&nbsp;

							<select name="city" class="col-md-3 form-control-lg" id="sel">
								<option value="">Please Select City</option>
								@foreach($data as $division=>$city)
								<optgroup label ="{{$division}}">
									@if(is_array($city))
									@foreach($city as $cities)
									<option value="{{$cities}}" {{ (request()->input('city') == $cities ? "selected":"") }}>{{$cities}}</option>}
									@endforeach
									@else
									<option value="{{$city}}" {{ (request()->input('city') == $city ? "selected":"") }}>{{$city}}</option>
									@endif
								</optgroup>
								@endforeach
							</select>&nbsp;&nbsp;&nbsp;&nbsp;

							<select class="col-md-3 form-control-lg" name="division" id="sel2">
								<option value="">Please Select Division</option>
								@foreach($data  as $division=>$city)
								<option value="{{$division}}" {{ (request()->input('division') == $division ? "selected":"") }}>{{ $division }}</option>
								@endforeach
							</select>
						</div>
						<center>
							<button type="submit" class="btn py-3 px-4 btn-primary" >Search</button>
							<button type="reset" id="btn_reset" class="btn py-3 px-4 btn-primary">Cancel</button>
						</center>
					</form>
				</center>
			</div>
		</div><!-- search form -->

		<div class="row justify-content-center pb-4">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h2 class="mb-4">Tour Destinations</h2>
			</div>
		</div>
		<div class="row">
			@foreach($destinations as $destination)
			<div class="col-md-4">
				<div class="project-wrap">
					<?php $some = json_decode($destination->image);  ?>
					@if(!empty($some))
					<img src='{{ asset("/storage/images/destination/".$destination->id."/$some[0]")}}'class="img">
					@else
					<img src='{{ asset("../goldenland/images/t2.jpg")}}'class="img">
					@endif
					<div class="text p-4">
						<a href="{{ route('package.indexById',$destination->id) }}"><span class="price">Packages</span></a>
						<span class="days">{{ $destination->division }}</span>
						<span>{{ $destination->city }}</span>
						<h3>{{ $destination->name }}</h3>
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
<!-- end main -->
@push('scripts')
<script src="{{ asset('goldenland/js/select2.min.js') }}"></script>
<script>
var $sel2 = $("#sel2").select2();
var $sel = $("#sel").select2();
/**
 * If Cancel button click,Select box is clear without reload window.
 * @var [type]
 */
$("#btn_reset").on("click",function(){
	$("#sel2").val(null).trigger("change");
	$("#sel").val(null).trigger("change");
})
</script>
@endpush
@endsection
