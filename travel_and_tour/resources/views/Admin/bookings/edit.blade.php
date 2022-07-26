@extends('layouts.admin')
@section('content')
	<a class="btn btn-primary tea" href="{{ route('bookings.index') }}"> Back</a>
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<center><h2 class="font-weight-bold">Edit Booking</h2></center>
		</div>
	</div>

	@if ($errors->any())
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<br><br>
	<div class="container">
		<div class="col-lg-10 container">
			<div class="comment-form-wrap">
				<form action="{{ route('bookings.update',$booking->id )}}" method="POST">
					@csrf
					@method('PUT')

					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<input type="hidden" id="pricelist" value="{{$pricelist}}">
							<div class="form-group  {{ $errors->has('package_id') ? 'has-error' : '' }}">
								<strong>Package</strong><span class="text-danger">*</span>
								<select class="form-control" name="package_id" id="package_id">
									@foreach($destinations as $destination)
										<optgroup label ="{{$destination->name}}">
											@foreach($packages as $package)
												@if($destination->id == $package->destination_id)
													<option value="{{$package->id}}" @if($package->id == $booking->package_id) selected @endif >{{$package->name}}</option>
													@endif
												@endforeach
											</optgroup>
										@endforeach
									</select>
								</div>
						</div>

						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group  {{ $errors->has('guest_no') ? 'has-error' : '' }}">
								<strong>Guest Number</strong><span class="text-danger">*</span>
								<input type="number" min="1" max="100" name="guest_no" id="guest_no" class="form-control" placeholder="Guest Number" value="{{ $booking->guest_no }}" min="1" oninput="validity.valid||(value='');">
							</div>
						</div>

						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group  {{ $errors->has('totalprice') ? 'has-error' : '' }}">
								<strong>Total Price:</strong><span class="text-danger">*</span>
								<input type="number" name="totalprice" id="totalprice" class="form-control" placeholder="Total Price" value="{{ $booking->totalprice }}">
							</div>
						</div>

						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group  {{ $errors->has('booking_date') ? 'has-error' : '' }}">
								<strong>Booking Date</strong><span class="text-danger">*</span>
								<input type="date" name="booking_date" class="form-control" placeholder="Booking Date" value="{{ $booking->booking_date }}">
							</div>
						</div>

						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group  {{ $errors->has('booking_remark') ? 'has-error' : '' }}">
								<strong>Booking Remark</strong><span class="text-danger">*</span>
								<textarea name="booking_remark" class="form-control" placeholder="Booking Remark">{{ $booking->booking_remark }}</textarea>
							</div>
						</div>

						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group  {{ $errors->has('status') ? 'has-error' : '' }}">
								<strong>Status</strong><span class="text-danger">*</span>
								<select name="status" class="form-control">
									<option value="0" @if($booking->status ==0) selected @endif>Pending</option>
										<option value="1" @if($booking->status ==1) selected @endif>Accept</option>
										</select>
							</div>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-12 text-center">
								<center><button type="submit" class="btn btn-primary">Update</button>
									<button type="reset" class="btn btn-primary">Clear</button></center>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<script>
var totalprice = document.getElementById("totalprice");
var package_id = document.getElementById("package_id");
var guest_no = document.getElementById("guest_no");
/**
* If Package_name change,TotalPrice is automatic change with appropriate value.
* If Guest_no change,TotalPrice is automatic change with appropriate value.
* @var [type]
*/
$("#package_id,#guest_no").change(function() {
	var pricelist = document.getElementById('pricelist').value;
	var price = JSON.parse(pricelist)[package_id.value];
	totalprice.value = price * guest_no.value;
});

$("#guest_no").keyup(function() {
	var pricelist = document.getElementById('pricelist').value;
	var price = JSON.parse(pricelist)[package_id.value];
	totalprice.value = price * guest_no.value;
});
</script>
@endsection
