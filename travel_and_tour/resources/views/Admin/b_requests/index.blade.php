@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb">
		<h2 class="font-weight-bold mar">Booking Requests</h2>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif

<div class="col-xs-12 col-sm-12 col-md-12">
	<table class="table table-bordered mar">
	<tr>
		<th>No</th>
		<th>Package Name</th>
		<th>Guest Number</th>
		<th>TotalPrice</th>
		<th>BookingDate</th>
		<th>BookingRemark</th>
		<th>Create User Name</th>
		<th>User Emial</th>
		<th width="280px">Action</th>
	</tr>
	@foreach ($bookingRequest as $booking)
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
			<form action="{{ route('bookings.approve',['id'=>$booking->id,'status'=>1]) }}" method="POST" class="pull-left">
				@csrf
				<button type="submit" class="btn btn-success">Approve</button>
			</form>
			<span class="rej">
				<button type="button" class="btn btn-danger btndelete" data-toggle="modal" data-target="#rejectModal{{$booking->id}}" id="{{ $booking->id}}">Reject</button>
			</span>
		</td>
	</tr>

	<div id="rejectModal{{$booking->id}}" class="modal" role="dialog">
		<div class="modal-dialog ">
			<form action="{{ route('bookings.approve',['id'=>$booking->id,'status'=>2]) }}" id="deleteForm{{$booking->id}}" method="post">
				<div class="modal-content">
					<div class="modal-header bg-danger">
						<h4 class="modal-title text-center">Confirm Reject</h4>
					</div>
					<div class="modal-body">
						{{ csrf_field() }}
						<p class="text-center">Are You Sure? You Want To Reject This Request ?</p>
					</div>
					<div class="modal-footer">
						<center>
							<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
							<button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="deleteData({{$booking->id}})">Yes, Reject</button>
						</center>
					</div>
				</div>
			</form>
		</div>
	</div>
	@endforeach
</table>
</div>

<script type="text/javascript">
/**
 * Delete Booking Request By Id
 * @param  id
 * @return view of Booking Request List
 */
function deleteData(id)
{
	$("#deleteForm"+id).submit();
}
</script>
@endsection
