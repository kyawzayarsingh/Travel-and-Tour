@extends('User.master')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" id="background-img" data-stellar-background-ratio="0.5">
	<div class="overlay">
	</div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate pb-5 text-center">
				<h1 class="mb-3 bread">Register</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="{{ route('userHome.index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Register</span></p>
			</div>
		</div>
	</div>
</section>

@if ($errors->any())
<div class="alert alert-danger">
	<strong>Whoops!</strong> There were some problems with your input.<br><br>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<div class="container">
	<div class="col-lg-10 container">
		<div class="comment-form-wrap">
			<center><h3 class="mb-5">Register Form</h3></center>
			<form action="{{ route('user.register') }}?package_id={{$package_id}}" class="p-5 bg-light" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<input type="hidden" name="package_id" value="{{$package_id}}">
				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					<label for="name">Name</label>&nbsp;<span class="text-danger">*</span>
					<input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ old('name') }}">
				</div>

				<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					<label for="email">Email Address</label>&nbsp;<span class="text-danger">*</span>
					<input type="email" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
				</div>

				<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
					<label for="phone">Phone</label>&nbsp;<span class="text-danger">*</span>
					<input type="text" class="form-control" name="phone" placeholder="Enter phone" value="{{ old('phone') }}">
				</div>

				<div class="form-group {{ $errors->has('profile') ? 'has-error' : '' }}">
					<label for="profile">Profile</label>
					<input type="file" class="form-control" name="profile" onchange="readURL(this);" >
					<img id="blah" />
				</div>

				<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
					<label for="address">Address</label>&nbsp;<span class="text-danger">*</span>
					<textarea name="address" class="form-control" placeholder="Enter address">{{ old('address') }}</textarea>
				</div>

				<div class="form-group {{ $errors->has('dob') ? 'has-error' : '' }}">
					<label for="Date of Birth">Date of Birth <span class="text-danger">(You must be adult!)</span></label>&nbsp;<span class="text-danger">*</span>
					<input type="date" class="form-control" name="dob" value="{{ old('dob') }}">
				</div>

				<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
					<label for="profile">Password <span class="text-danger">(The password must be at least 8 characters or numbers)</span></label>&nbsp;<span class="text-danger">*</span>
					<input type="password" class="form-control" name="password" placeholder="password" value="{{ old('password') }}">
				</div>

				<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
					<label for="password">Confirm Password</label>&nbsp;<span class="text-danger">*</span>
					<input type="password" class="form-control" name="password_confirmation" placeholder="Confirm your password" value="{{ old('password') }}">
				</div>

				<div class="form-group">
					<center>
						<button type="submit" class="btn py-3 px-4 btn-primary">Register</button>
						<button type="reset" class="btn py-3 px-4 btn-primary">Clear</button>
					</center>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
/**
 * show preview profile picture
 */
function readURL(input) {
		 if (input.files && input.files[0]) {
				 var reader = new FileReader();
				 reader.onload = function (e) {
						 $('#blah')
								 .attr('src', e.target.result);
				 };
				 reader.readAsDataURL(input.files[0]);
		 }
 }
</script>
@endsection
