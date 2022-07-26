@extends('layouts.admin')
@section('content')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row">
<div class="col-lg-12 margin-tb">
	<h2 class="font-weight-bold">Booking CheckIn</h2>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<div class="col-xs-12 col-sm-12 col-md-12">
<center>
	<form  action="{{ route('checkInSearch') }}" method="get" >
		@csrf
		<div id="dv1">
			<label for="booking_id">Booking_ID : </label>
			<input type="text" name="booking_id" value="{{ request()->input('booking_id') }}">
		</div>
		<div id="dv1">
			<label for="bookingDate">Booking Date : </label>
			<input type="date" name="booking_date" value="{{ request()->input('booking_date') }}">
		</div>
		<button type="submit" class="btn btn-dark" id="btn-search">Search</button>
	</form>
</center>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<table class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Package</th>
		<th>Guest Number</th>
		<th>Total Price</th>
		<th>Booking Date</th>
		<th>Booking Remark</th>
		<th>User Name</th>
		<th>User Email</th>
		<th>Action</th>
	</tr>
	@foreach ($bookings as $booking)
	<tr>
		<td>{{ $booking->id }}</td>
		<td>{{ $booking->package_name}}</td>
		<td>{{ $booking->guest_no}}</td>
		<td>{{ $booking->totalprice}}</td>
		<td>{{ $booking->booking_date}}</td>
		<td id="word">{{ $booking->booking_remark}}</td>
		<td id="word">{{ $booking->user_name }}</td>
		<td id="word">{{ $booking->user_email }}</td>
		<td>
			<form action="{{ route('bookings.approve',['id'=>$booking->id,'status'=>3]) }}" method="POST" class="pull-left">
				@csrf
				<button type="submit" class="btn btn-success">Paid</button>
			</form>
		</tr>
		@endforeach
	</table>
</div>
@endsection
