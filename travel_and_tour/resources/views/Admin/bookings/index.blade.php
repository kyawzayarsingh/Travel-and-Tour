@extends('layouts.admin')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="row">
	<div class="col-lg-12 margin-tb">
		<h2 class="font-weight-bold mar">Booking List</h2>
	</div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif
<div class="col-xs-12 col-sm-12 col-md-12">
	<center>
		<form  action="{{ route('bookings.search') }}" method="get" >
			@csrf
			<div id="dv1">
				<label for="packageName">Package Name : </label>
				<input type="text" name="package_name" value="{{ request()->input('package_name') }}">
			</div>
			<div id="dv1">
				<label for="bookingDate">Booking Date : </label>
				<input type="date" name="booking_date" value="{{ request()->input('booking_date') }}">
			</div>
			<div id="dv1">
				<label for="status">Status : </label>
				<select name="status" class="btn btn-sm bod">
					<option value="">Select</option>
					<option value="1" {{ (request()->input('status') == 1 ? "selected":"") }}>Approve</option>
					<option value="3" {{ (request()->input('status') == 3 ? "selected":"") }}>Paid</option>
				</select>
			</div>
			<button type="submit" class="btn btn-dark" id="btn-search">Search</button>
			<a class="btn btn-success" href="{{ route('bookings.create') }}">Create New Booking</a>
		</form>
	</center>
</div>
<br>
<div class="col-xs-12 col-sm-12 col-md-12">
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Package</th>
      		<th>Destination</th>
			<th>Guest Number</th>
			<th>Booking Date</th>
			<th>Total Price</th>
			<th>Remark</th>
			<th>Created By</th>
			<th>User Email</th>
			<th width="350px">Action</th>
		</tr>

		@foreach($bookings as $booking)
		<tr>
			<td>{{ $booking->id  }}</td>
			<td>{{ $booking->package_name }}</td>
      <td>{{ $booking->destination_name }}</td>
			<td>{{ $booking->guest_no}}</td>
			<td>{{ $booking->booking_date}}</td>
			<td>{{$booking->totalprice}} </td>
			<td id="word">{{ $booking->booking_remark}}</td>
			<td id="word">{{ $booking->user_name }}</td>
			<td id="word">{{ $booking->user_email }}</td>
			<td>
				<a class="btn btn-info" href="{{ route('bookings.show',$booking->id) }}">Show</a>
				@if($booking->status != 3)
				<a class="btn btn-primary" href="{{ route('bookings.edit',$booking->id ) }}">Edit</a>
				<button type="button" class="btn btn-danger btndelete" data-toggle="modal" data-target="#deleteModal{{$booking->id}}" id="{{ $booking->id}}" >Delete</button>
				@endif
			</td>
		</tr>
	</div>
	<div id="deleteModal{{$booking->id}}" class="modal" role="dialog">
		<div class="modal-dialog ">
			<!-- Modal content-->
			<form action="{{ route('bookings.delete',$booking->id)}}" id="deleteForm{{$booking->id}}" method="post">
				<div class="modal-content">
					<div class="modal-header bg-danger">
						<h4 class="modal-title text-center">Confirm Delete</h4>
					</div>
					<div class="modal-body">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<p class="text-center">Are You Sure Want To Delete ?</p>
					</div>
					<div class="modal-footer">
						<center>
							<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
							<button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="deleteData({{$booking->id}})">Yes, Delete</button>
						</center>
					</div>
				</div>
			</form>
		</div>
	</div>
	@endforeach
</table>

{{$bookings->links()}}

<script type="text/javascript">
function deleteData(id)
{
	$("#deleteForm"+id).submit();
}
</script>

@endsection
