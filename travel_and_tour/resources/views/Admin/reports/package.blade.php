@extends('layouts.admin')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row">
	<div class="col-lg-12 margin-tb">
			<h2 class="font-weight-bold mar">Most Demanded Packages</h2>
	</div>
	<div class="col-lg-12 margin-tb">
		<center>
			<div class="tab">
				<form class=""method="post">
					@csrf

					<input type="number" class="btn btn-lg btn-light dropdown-toggle yearpicker" value="{{$year}}" name="year">
					<button type="submit" class="btn btn-info btn-md repDes" formaction="{{ route('reports.packageSearch')}}">Search</button>
					<button type="submit" class="btn btn-success btn-md repDes" formaction="{{ route('reports.packageExport')}}">Export</a>
					</form>
				</div>
			</center>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered container">
			<tr>
				<th>No</th>
				<th>Package</th>
				<th>Destination Name</th>
				<th>No: of Booking</th>
			</tr>

			@foreach($packages as $package)
			<tr>
				<td>{{ ++$no  }}</td>
				<td>{{ $package->name }}</td>
				<td>{{ $package->destination_name}}</td>
				<td>{{$package->total_bookings}}</td>
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
