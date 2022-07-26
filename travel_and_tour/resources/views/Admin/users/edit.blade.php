@extends('layouts.admin')
@section('content')
<a class="btn btn-primary tea" href="{{ route('users.index') }}"> Back</a><br>
<div class="row">
	<div class="col-lg-12 margin-tb">
		<center>
			<h2 class="font-weight-bold">Edit User</h2>
		</center>
	</div>
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
<div class="container">
	<div class="col-lg-10 container">
		<div class="comment-form-wrap">
			<form action="{{route ('users.update',$user->id)}}" method="POST"  enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Name</strong><span class="text-danger">*</span>
							<input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name}}">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<strong for="profile">Profile</strong>
						<div class="profile" >
							<input type="file" name="profile" id="file-input">
							<img id = "profile_img" src="{{ asset('/storage/images/user/'. $user->id .'/'. $user->profile) }}">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Address</strong><span class="text-danger">*</span>
							<textarea class="form-control" id="txt-address" name="address" placeholder="Address">{{ $user->address }}</textarea>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Email</strong><span class="text-danger">*</span>
							<input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email}}">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Phone</strong><span class="text-danger">*</span>
							<input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ $user->phone}}">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Date Of Birth</strong><span class="text-danger">*</span>
							<input type="date" name="dob" class="form-control" placeholder="Date Of Birth" value="{{ $user->dob }}">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Type</strong><span class="text-danger">*</span>
							<select name="type" class="form-control">
								<option value=0 @if($user->type ==0) selected @endif>Admin</option>
								<option value=1 @if($user->type ==1) selected @endif>User</option>
							</select>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 text-center">
						<center><button type="submit" class="btn btn-primary">Update</button>
						<button type="reset" class="btn btn-primary">Clear</button></center>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
/**
 * If file choose image,direct show image.
 * @param   fileInput
 * @return show image;
 */
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#profile_img').attr('src', e.target.result);
      $('#profile_img').hide();
      $('#profile_img').fadeIn(650);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#file-input").change(function() {
  readURL(this);
});
</script>

@endsection
