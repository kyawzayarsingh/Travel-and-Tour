@extends('User.master')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" id="background-img" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate pb-5 text-center">
				<h1 class="mb-3 bread">Booking</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="{{ route('userHome.index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span><span class="mr-2">Booking</span></p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
	<br>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 order-md-last ftco-animate">
				<div class="row">
					<div class="col-12">
						<h1>Booking List</h1>
						@if ($message = Session::get('success'))
						<div class="alert alert-success">
							<p>{{ $message }}</p>
						</div>
						@endif
						<table class="table table-bordered" id="tb">
							<tr>
								<th>No</th>
								<th>Package Name</th>
								<th>Destination Name</th>
								<th>Guest Number</th>
								<th>Booking Date</th>
								<th>Total Price</th>
								<th>Status</th>
								<th width=200px>Action</th>
							</tr>
							@foreach($bookings as $booking)
							<tr>
								<td>{{ ++$i  }}</td>
								<td>{{ $booking->package_name }}</td>
								<td>{{ $booking->destination_name }}</td>
								<td>{{ $booking->guest_no}} </td>
								<td>{{ $booking->booking_date}}</td>
								<td>{{$booking->totalprice}} kyats</td>
								<td>
									@if($booking->status == 0)
									Pending
									@elseif($booking->status == 1 || $booking->status == 3)
									Accepted
									@endif
								</td>
								<td>
									@if($booking->status == 0)
										<a href="{{ route('booking.edit',$booking->id)}}" class="btn btn-primary rej">Edit</a>
									@endif
									<form action="{{ route('booking.delete',$booking->id)}}" method="post" class="rej">
										@csrf
										@method('DELETE')
										@if($booking->status ==0)
										<button type="submit" class="btn btn-danger">Cancel</button>
										@endif
									</form>
								</td>
							</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
			<div id="infoModal" class="modal" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<!-- Modal content-->
					<form action="{{ route('booking.index')}}" id="" method="post">
						<div class="modal-content">
							<div class="modal-header bg-warning">
								<h5 class="modal-title text-center" style="color:white;">Booking Information</h5>
							</div>

							<div class="modal-body">
								{{ csrf_field() }}
								<p class="text-center">Your booking request is successfully received.We'll contact you once your request is confirmed.</p>
							</div>

							<div class="modal-footer">
								<center>
									<button type="submit" name="" class="btn btn-warning" data-dismiss="modal" style="color:white;">OK</button>
								</center>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<br>
</section>

<script>
/**
 * If booking is successful,modal is show.
 */
$( document ).ready(function() {
	@if (Session::has('info'))
	$('#infoModal').modal('show');
	@endif
});
</script>

@endsection
