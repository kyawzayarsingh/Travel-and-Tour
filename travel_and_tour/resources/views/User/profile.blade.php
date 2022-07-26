@extends('User.master')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" id="background-img" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate pb-5 text-center">
				<h1 class="mb-3 bread">Profile</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="{{ route('userHome.index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Profile <i class="ion-ios-arrow-forward"></i></span></p>
			</div>
		</div>
	</div>
</section>

<!-- main start -->
<br><br>
@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif
<div class="container col-lg-9">
	<center><h1>Your Information</h1><br></center>
	<div class="row">
		<div class="col-12">
			<div class="card p-5 bg-light">
				<div class="card-body">
					<div class="card-title mb-4">
						<div class="d-flex justify-content-start">
							@if ($user -> profile != null)
							<div class="image-container">
								<img src="{{ asset('/storage/images/user/'. $user->id .'/'. $user->profile) }}" id="profile_img">
							</div>
							@else
								<h5>You have no profile picture.</h5>
							@endif
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="row">
								<div class="col-sm-3 col-md-2 col-5">
									<label id="lb">Full Name</label>
								</div>
								<div class="col-md-8 col-6">
									{{ $user -> name }}
								</div>
							</div>
							<hr />

							<div class="row">
								<div class="col-sm-3 col-md-2 col-5">
									<label id="lb">Email</label>
								</div>
								<div class="col-md-8 col-6">
									{{ $user -> email }}
								</div>
							</div>
							<hr />

							<div class="row">
								<div class="col-sm-3 col-md-2 col-5">
									<label id="lb">Full Address</label>
								</div>
								<div class="col-md-8 col-6">
									{{ $user -> address }}
								</div>
							</div>
							<hr />

							<div class="row">
								<div class="col-sm-3 col-md-2 col-5">
									<label id="lb">Phone</label>
								</div>
								<div class="col-md-8 col-6">
									{{ $user -> phone }}
								</div>
							</div>
							<hr />

							<div class="row">
								<div class="col-sm-3 col-md-2 col-5">
									<label id="lb">Birth Date</label>
								</div>
								<div class="col-md-8 col-6">
									{{ $user -> dob }}
								</div>
							</div>
							<hr />
							<center><a href="{{ route('profile.edit',$user->id)}}" class="btn py-3 px-4 btn-primary">Edit</a></center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br><br>
<!-- end main -->
@endsection
