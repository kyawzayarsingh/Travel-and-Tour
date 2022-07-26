@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb">
		<center>
			<h2 class="font-weight-bold"> Show User</h2>
		</center>
	</div>
</div><br><br>
<div class="container">
	<div class="col-lg-10 container">
		<div class="comment-form-wrap">
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Name</strong>
						<input type="text" name="name" class="form-control"  value="{{ $user->name}}" disabled>
					</div>
				</div>

				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Photo</strong><br>
						<img src="{{ asset('/storage/images/user/'. $user->id .'/'. $user->profile) }}" id="photo-img" disabled>
					</div>
				</div>

				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Email</strong>
						<input type="text" name="email" class="form-control"  value="{{ $user->email}}" disabled>
					</div>
				</div>

				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Phone</strong>
						<input type="text" name="phone" class="form-control" value="{{ $user->phone}}" disabled>
					</div>
				</div>

				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Address</strong>
						<textarea class="form-control"  name="address" disabled>{{ $user->address }}</textarea>
					</div>
				</div>

				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Date Of Birth</strong>
						<input type="text" name="dob" class="form-control" value="{{ $user->dob }}" disabled>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Type</strong>
						<input type="text" name="type" class="form-control" value="@if($user->type == 0) admin @else user @endif" disabled>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Status</strong>
						<input type="text" class="form-control" name="status" value="@if($user->status == 0) inactive @else active @endif" class="status" disabled>
					</div>
				</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<center><a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a></center>
					</div>
			</div>
		</div>
	</div>
</disv>

@endsection
