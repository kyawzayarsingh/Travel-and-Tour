@extends('User.master')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" id="background-img" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate pb-5 text-center">
				<h1 class="mb-3 bread">Login</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="{{ route('userHome.index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Sign in</span></p>
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

@if ($message = Session::get('success'))
<div class="alert alert-warning">
	<p>{{ $message }}</p>
</div>
@endif
<!-- main start -->

<div class="container">
	<div class="col-lg-10 container">
		<div class="comment-form-wrap">
			<center><h3 class="mb-5">Sign In Form</h3></center>
			<form action="{{ route('user.login') }}" class="p-5 bg-light" method="get">
				<input type="hidden" name="package_id" value="{{$package_id}}">
				<div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
					<label>Email</label>&nbsp;<spna class="text-danger">*</span>
					<input type="email" name="email" class="form-control"
					value="{{ old('email') }}">
				</div>
				<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					<label>Password</label>&nbsp;<span class="text-danger">*</span>
					<input type="Password" name="password" class="form-control" value="{{ old('password') }}">
				</div>
				<div class="form-group">
					<center><input type="submit" value="Login" class="btn py-3 px-4 btn-primary">
					</div>
					@if($package_id)
					<center><a href="{{route('register.index')}}?package_id={{$package_id}}">Register Here</a></center>
					@else
					<center><a href="{{route('register.index')}}">Register Here</a></center>
					@endif
				</form>
			</div>
		</div>

		<div id="infoModal" class="modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<!-- Modal content-->
				<form action="{{ route('signIn.index')}}?package_id={{$id ?? ''}}" id="" method="post">
					<div class="modal-content">
						<div class="modal-header bg-warning">
							<h5 class="modal-title text-center" id="sign-text">Register Information</h5>
						</div>

						<div class="modal-body">
							{{ csrf_field() }}
							<p class="text-center">Your registeration request is successfully received.
								We'll contact you once your request is confirmed.</p>
						</div>
						<div class="modal-footer">
							<center>
								<button type="submit" name="" class="btn btn-warning" data-dismiss="modal" id="sign-text">OK</button>
							</center>
						</div>
					</div>
				</form>
			</div>
		</div>

		<script>
		$( document ).ready(function() {
			@if (Session::has('info'))
			$('#infoModal').modal('show');
			@endif
		});

		</script>
</div>
<br>
<!-- end main -->

		@endsection
