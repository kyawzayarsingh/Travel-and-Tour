<!DOCTYPE html>
<html>
<head>
	<title>ItsolutionStuff.com</title>
</head>
<body>
	<span>Hi {{$booking-> user_name}}</span>
	<p>Thank you. Your booking is successful.</p>

	<h5>Following are your booking details:</h5>
	<p>
		Package: {{ $booking -> package_id}} <br>
		Destination: {{ $booking -> destination_name}}<br>
		Number of Guests:{{ $booking -> guest_no}}<br>
		Booking Date:{{ $booking -> booking_date}} <br>
		Booking Remark:{{ $booking -> booking_remark}}<br>
		Total price:{{ $booking -> totalprice}}<br><br><br>
		Have a nice trip!
	</p>
	<span>Best;</span>
	<p>Goldenland Travel Agency</p>
</body>
</html>
