@extends('layouts.admin')
@section('content')
<a class="btn btn-primary tea" href="{{ route('users.index') }}"> Back</a><br>
	<div class="col-lg-12 margin-tb">
		<center>
				<h2 class="font-weight-bold">Add New User</h2>
		</center>
	</div>


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
<br><br>
<div class="container">
	<div class="col-lg-10 container">
		<div class="comment-form-wrap">
			<form action="{{ route('users.store')}}" method="POST"  enctype="multipart/form-data" >
				@csrf

				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Name</strong><span class="text-danger">*</span>
							<input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
						</div>
					</div>

					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Photo</strong><br>
							<input type="file" name="profile" onchange="readURL(this);" >
							<img id="blah" />
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Email</strong><span class="text-danger">*</span>
							<input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
						</div>
					</div>

					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Phone</strong><span class="text-danger">*</span>
							<input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone') }}">
						</div>
					</div>

					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Date Of Birth</strong><span class="text-danger">*</span>
							<input type="date" name="dob" class="form-control" placeholder="Date Of Birth" value="{{ old('dob') }}">
						</div>
					</div>

					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Address</strong><span class="text-danger">*</span>
							<textarea class="form-control" id="txt-address" name="address" placeholder="Address">{{ old('address') }}</textarea>
						</div>
					</div>

					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Type</strong><span class="text-danger">*</span>
							<select name="type" class="form-control">
								<option value=0>Admin</option>
								<option value=1>User</option>
							</select>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 text-center">
						<center><button type="submit" class="btn btn-primary">Create</button></center>
					</div>
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
