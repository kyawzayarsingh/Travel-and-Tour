@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb ">
		<h2 class="font-weight-bold mar">Most Tour Months</h2>
	</div>
	<div class="col-lg-12 margin-tb">
		<center>
			<div class="tab">
				<form class=""method="post">
					@csrf
					<input type="number" class="btn btn-lg btn-light dropdown-toggle yearpicker" name="year" id="year" value="{{ $year }}">
					<button type="submit" class=" btn btn-info btn-md repDes" formaction="{{ route('report.searchMonth') }}">Search</button>
					<button type="submit" class="btn btn-success btn-md repDes"  id="btn-export" formaction="{{ route('reportmonth.export') }}">Export</a>
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
				<th>Month</th>
				<th>No of Guest</th>
				<th>No of Booking</th>

			</tr>
			@foreach($tourmonths as $tourmonth)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$tourmonth->months}}</td>
				<td>{{$tourmonth->no_Guest}}</td>
				<td>{{$tourmonth->booking_No}}</td>
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
