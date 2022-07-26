@extends('User.master')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" id="background-img" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate pb-5 text-center">
				<h1 class="mb-3 bread">Profile Edit</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="{{ route('userHome.index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="{{ route('profile.index') }}">Profile <i class="ion-ios-arrow-forward"></i></a></span> <span>Profile Edit<i class="ion-ios-arrow-forward"></i></span></p>
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
<div class="col-lg-10 container">
	<div class="comment-form-wrap">
		<center><h3 class="mb-5">Profile Edit Form</h3></center>
		<form action="{{route ('profile.update',$user->id)}}" method="post" class="p-5 bg-light" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<label for="profile">Profile</label>
			<div class="form-control profile {{ $errors->has('profile') ? 'has-error' : '' }}" >
				<input type="file" name="profile" id="file-input">
				<img id = "profile-img" src="{{ asset('/storage/images/user/'. $user->id .'/'. $user->profile) }}">
			</div>
			<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
				<label for="contact">Contact</label><span class="text-danger">*</span>
				<input type="text" class="form-control" name="phone" id="phone" placeholder="Enter contact" value="{{ $user->phone }}">
			</div>
			<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
				<label for="address">Address </label><span class="text-danger">*</span>
				<input type="text" class="form-control" name="address" id="address" placeholder="Enter address" value="{{ $user->address}}">
			</div>
			<div class="form-group">
				@if ($errors->any())
				<input type="checkbox" class ="checkbox" name="password" id="check"  checked>&nbsp;&nbsp;
				@else
				<input type="checkbox" class ="checkbox" name="password" id="check" >&nbsp;&nbsp;
				@endif
				<label for="password" id= "pass">Change Password?</label>
				<input type="password" name="current_password" id="text" class="form-control txt" placeholder="current_password">
				<input type="password" name="new_password" id="text1" class="form-control txt" placeholder="new_password">
				<input type="password" name="new_confirm_password" id="text2" class="form-control txt" placeholder="new_confirm_password">
			</div>
			<div class="form-group">
				<center>
					<a href="{{ route('profile.index')}} "><button type="button" class="btn btn-primary" >Close</button></a>
					<button type="submit" class="btn btn-primary" id="save">Save changes</button>
				</center>
			</div>
		</form>
	</div>
</div>
<script>
var checkBox = document.getElementById("check");
var text =  document.getElementById("text");
var text1 = document.getElementById("text1");
var text2 = document.getElementById("text2");
var pass = document.getElementById("pass");
@if ($errors->any())
text.style.display = "block";
text1.style.display = "block";
text2.style.display = "block";
pass.style.display = "inline-block";
@endif
/**
 * if checkbox click,input type = 'password' are show.
 * @var [type]
 */
$(".checkbox").change( function() {
	if (this.checked==true){
		text.style.display = "block";
		text1.style.display = "block";
		text2.style.display = "block";
		pass.style.display = "inline-block";
	}else {
		text.style.display = "none";
		text1.style.display = "none";
		text2.style.display = "none";
		pass.style.display = "inline-block";
	}
});
/**
 * If file choose image,direct show image.
 * @param   fileInput
 * @return show image;
 */
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#profile-img').attr('src', e.target.result);
      $('#profile-img').hide();
      $('#profile-img').fadeIn(650);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#file-input").change(function() {
  readURL(this);
});

</script>
@endsection
