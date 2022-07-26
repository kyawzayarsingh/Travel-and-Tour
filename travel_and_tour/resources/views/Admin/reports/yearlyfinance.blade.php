@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb">
		<h2 class="font-weight-bold mar">Yearly Finance</h2>
	</div>
	<div class="col-lg-12 margin-tb">
		<center>
			<div class="tab">
				<form class=""method="post">
					@csrf
					<input type="number" class="btn btn-lg btn-light dropdown-toggle yearpicker" name="year" id="year" value="{{ $year }}">
					<button type="submit" class=" btn btn-info btn-md repDes" formaction="{{ route('report.searchYear') }}">Search</button>
					<button type="submit" class="btn btn-success btn-md repDes"  id="btn-export" formaction="{{ route('reportyear.export') }}">Export</a>
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
				<th>Total Income  Per Month</th>
				<th>Total Booking  Per Month</th>
			</tr>
			<?php
			$results = array();
			?>
			<?php $i=1; ?>
			@foreach($touryears as $k=>$value)
			<tr>
				<td>{{$i}}</td>
				@foreach($value as $k1=>$v1)
				<td>{{$v1}}</td>
				@endforeach
			</tr>
			<?php $i++; ?>
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
