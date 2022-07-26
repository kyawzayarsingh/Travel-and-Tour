@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb">
		<h2 class="font-weight-bold mar">Most Booked Customers</h2>
	</div>
	<div class="col-lg-12 margin-tb">
		<center>
			<div class="tab">
				<form class=""method="post">
					@csrf
					<input type="number" class="btn btn-lg btn-light dropdown-toggle yearpicker"  name="year" value="{{ $request->year }}">
					<button type="submit" class=" btn btn-info btn-md repDes" formaction="{{ route('report.bookingSearch') }}">Search</button>
					<button type="submit" class="btn btn-success btn-md repDes"  id="btn-export" formaction="{{ route('report.bookingExport') }}">Export</a>
					</form>
				</div>
			</center>
		</div>
	</div>
	@if ($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
	@endif
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered container">
			<tr>
				<th>No</th>
				<th>Customer Name</th>
				<th>User Type</th>
				<th>No of Booking</th>
				<th>Email</th>
				<th>Phone No</th>
			</tr>
			@foreach ($bookingCustomers as $bookingCustomer)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $bookingCustomer->name }}</td>
				<td>{{ $bookingCustomer->type }}</td>
				<td>{{ $bookingCustomer->bookingNo }}</td>
				<td>{{ $bookingCustomer->email }}</td>
				<td>{{ $bookingCustomer->phone }}</td>
			</tr>
			@endforeach
		</table>
	</div>
	<script type="text/javascript">
	/**
	 * Year Picker
	 * @var year
	 */
	$(document).ready(function() {
		$(".yearpicker").yearpicker();
	});
</script>
@endsection
