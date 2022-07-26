@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb">
			<h2 class="font-weight-bold mar">Most Popular Destinations</h2>
	</div>
	<div class="col-lg-12 margin-tb">
		<center>
			<div class="tab">
				<form class=""method="post">
					@csrf

					<input type="number" class="btn btn-lg btn-light dropdown-toggle yearpicker" name="year" id="year" value="{{ $year }}">
					<button type="submit" class=" btn btn-info btn-md repDes" formaction="{{ route('reportDest.search') }}">Search</button>
					<button type="submit" class="btn btn-success btn-md repDes" formaction="{{ route('reportDest.export') }}">Export</a>
					</form>
				</div>
			</center>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered container">
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>City</th>
				<th>Division</th>
				<th>No of Guest</th>
			</tr>
			@foreach ($destinations as $destination)
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $destination->name }}</td>
				<td>{{ $destination->city }}</td>
				<td>{{ $destination->division }}</td>
				<td>{{ $destination->guest_no }}</td>
			</tr>
			@endforeach
		</table>
		<div>
	{!! $destinations->links() !!}

	<script>
	/**
	 * Year Picker
	 * @var year
	 */
	$(document).ready(function() {
		$(".yearpicker").yearpicker();
	});
</script>
@endsection
