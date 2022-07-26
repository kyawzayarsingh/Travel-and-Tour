@extends('User.master')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" id="background-img" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate pb-5 text-center">
				<h1 class="mb-3 bread">Booking Edit </h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="{{ route('userHome.index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="{{ route('booking.index') }}">Booking <i class="ion-ios-arrow-forward"></i></a></span> <span>Booking Edit</span></p>
			</div>
		</div>
	</div>
</section>
<section class="ftco-section ftco-no-pt ftco-no-pb">
	<div class="container">
		<div class="row">

			<!-- main -->
			<div class="col-lg-8 order-md-last ftco-animate ">

				<!--  <h1>Package List</h1> -->
				<br> <br>
				@if ($errors->any())

				<div class="alert alert-danger" style="margin-left: 50px; width: 134.3%;">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif

				@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
				@endif
			<form action="{{ route('booking.update',$booking->id)}}" class="p-5 bg-light" method="POST" id="tb-packageDetail">
				@csrf
  			@method('PUT')
				<div class="form-group">
          <input type="hidden" name="price" value="{{ $package->price}} " id="price">
          <input type="hidden" name="package_id" value="{{ $package->id}}">
          <div class="form-group row">
						<label for="Package" class="col-sm-6 col-from-label">Package Name</label>
						<div class="col-sm-6">
							<input type="text" name="package_name" class="form-control-md" value="{{ $package->name }}" disabled>&nbsp;
						</div>
					</div>

          <div class="form-group row">
						<label for="destination" class="col-sm-6 col-from-label">Destination Name</label>
						<div class="col-sm-6">
							<input type="text" name="destination" class="form-control-md" value="{{ $destination->name }}" disabled>&nbsp;
						</div>
					</div>

          <div class="form-group row {{ $errors->has('booking_date') ? 'has-error' : '' }}">
						<label for="booking_date" class="col-sm-6 col-from-label">Date  <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<input type="date" name="booking_date" class="form-control-md" value="{{ $booking->booking_date }}">&nbsp;
						</div>
					</div>

					<div class="form-group row {{ $errors->has('guest_no') ? 'has-error' : '' }}">
						<label for="guest_no" class="col-sm-6 col-from-label">Number of Guest  <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<input type="number" max="100" id="guestNo" name="guest_no" oninput="myFunction();validity.valid||(value='');" class="form-control-md" value="{{ $booking->guest_no }}">

						</div>
					</div>

					<div class="form-group row">
						<label for="total" class="col-sm-6 col-from-label">Total price will be charged </label>
						<div class="col-sm-6">
							<span id="total" style="color:orange;" name="totalprice"></span>
						</div>
					</div>

					<div class="form-group row {{ $errors->has('booking_remark') ? 'has-error' : '' }}">
						<label for="booking_remark" class="col-sm-6 col-from-label">Booking Remark  <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<textarea name="booking_remark" class="form-control-md">{{ $booking->booking_remark }}</textarea>
						</div>
					</div>
				</div>

				<div class="form-group text-center">
					<button type="submit" class="btn py-2 px-3 btn-primary" id="btn-booking" >Update</button>
          <a href="{{ route('booking.index')}} "><button type="button" class="btn py-2 px-3 btn-primary" >Close</button></a>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
@if (session('success'))
$('#infoModal').modal('show');
@endif
/**
 * If Guest_no write,Total price is automatice show.
 * @return show TotalPrice
 */
function myFunction() {
	var x = document.getElementById("guestNo").value;
	var y= document.getElementById("price").value;
	parseInt(x,y);
	var z=x*y;
	document.getElementById("total").innerHTML =  z+" kyats for "+ x + " people.";
}
/**
 * If clear button click,TotalPrice is hide.
 * @return hide TotalPrice.
 */
function clearTotalInfo(){
	document.getElementById("total").innerHTML=" ";
}

$( document ).ready(function() {
	myFunction();
	$('#guestNo').bind('copy paste', function(e) {
	      e.preventDefault();
	 });
});
</script>

</section> <!-- .section -->
@endsection
