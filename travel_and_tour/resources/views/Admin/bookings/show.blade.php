@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb">
		<center>
			<h2 class="font-weight-bold">Show Booking</h2>
		</center>
	</div>
</div>
<div class="container">
	<div class="col-lg-10 container">
		<div class="comment-form-wrap">
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Package</strong>
						<input type="text" name="name" class="form-control"  value="{{ $package->name }}" disabled>
					</div>
				</div>

				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Guest Number</strong>
						<input type="text" name="guest_no" class="form-control" value="{{ $booking->guest_no}}" disabled>
					</div>
				</div>

				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Total Price</strong>
						<input type="text" name="totalprice" class="form-control" value="{{ $booking->totalprice}}" disabled>
					</div>
				</div>

				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Booking Date</strong>
						<input type="text" name="booking_date" class="form-control" value="{{ $booking->booking_date}}" disabled>
					</div>
				</div>

				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Booking Remark</strong>
						<input type="text" name="booking_remark" class="form-control" value="{{ $booking->booking_remark}}" disabled>
					</div>
				</div>

				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Status</strong>
						<input type="text" class="form-control" name="status" value="@if($booking->status == 0) inactive @else active @endif" class="status" disabled>
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<center>
						<a class="btn btn-primary" href="{{ route('bookings.index') }}"> Back</a>
					</center>
				</div>
			</div>
		</div>
	</div>
	@endsection
