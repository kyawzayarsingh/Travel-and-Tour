<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<title></title>
</head>
<body>
	<div class="container">
		<h2 class="">GOLDENLAND</h2>
		<h3> TRAVEL AND TOUR AGENCY</h3>
		<span>Dear {{$booking-> user_name}}</span>
		<p>Thank you. Your booking is successful.</p>
		<h4>Your booking details: </h4>

		<table class="table table-bordered">
			<tr class="table-info">
				<th>Booking Name</th>
				<td>{{$booking-> user_name}}</td>
			</tr>
			<tr class="table-light">
				<th>Booking ID</th>
				<td>{{$booking-> id}}</td>
			</tr>

			<tr class="table-info">
				<th>Package Name</th>
				<td>{{ $booking -> package_name}}</td>
			</tr>

			<tr class="table-light">
				<th>Destination Name</th>
				<td>{{ $booking -> destination_name}}</td>
			</tr>

			<tr class="table-info">
				<th>Package Price(1 Person)</th>
				<td>{{ $booking -> package_price}}</td>
			</tr>
			<tr class="table-light">
				<th>Number of guest</th>
				<td>{{ $booking -> guest_no}}</td>
			</tr>

			<tr class="table-info">
				<th>Total Price({{$booking ->guest_no}} people)</th>
				<td>{{ $booking -> totalprice}} kyats</td>
			</tr>

			<tr class="table-light">
				<th>Booking Date</th>
				<td>{{ $booking -> booking_date}}</td>
			</tr>

			<tr class="table-info">
				<th>Remark </th>
				<td>{{ $booking -> booking_remark}}</td>
			</tr>
		</table>
		<p>
			Have a nice trip!
		</p>

		<span>Best;</span>
		<p>Goldenland Travel Agency</p>
	</div>

</body>
</html>
