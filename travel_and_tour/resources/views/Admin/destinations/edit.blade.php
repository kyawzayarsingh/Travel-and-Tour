@extends('layouts.admin')
@section('content')
<a class="btn btn-primary tea" href="{{ route('destinations.index') }}"> Back</a>
<div class="row">
	<div class="col-lg-12 margin-tb">
		<center>
			<h2>Edit destination</h2>
		</center>
	</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-danger">
	<p>{{ $message }}</p>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
	<strong>Whoops!</strong> There were some problems with your input.<br><br>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif<br><br>
<div class="container">
	<div class="col-lg-10 container">
		<div class="comment-form-wrap">
			<form action="{{route ('destinations.update',$destination->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Name</strong><span class="text-danger">*</span>
							<input type="text" name="name" class="form-control" placeholder="Name" value="{{ $destination->name}}">
						</div>
					</div>

					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Description</strong><span class="text-danger">*</span>
							<textarea name="description" class="form-control" placeholder="Description">{{ $destination->description}}</textarea>
						</div>
					</div>

					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>City</strong><span class="text-danger">*</span>
							<select class="form-control" name="city">
								@foreach($data as $division=>$city)
								<optgroup label ="{{$division}}">
									@if(is_array($city))
									@foreach($city as $cities)
									<option value="{{$cities}}" @if ($destination->city == $cities) selected @endif>{{ $cities }}</option>}
									@endforeach
									@else
									<option value="{{$city}}" @if ($destination->city == $city) selected @endif>{{$city}}</option>
									@endif
								</optgroup>
								@endforeach
							</select>
						</div>
					</div>
					
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Division</strong><span class="text-danger">*</span>
							<select class="form-control" name="division">
								@foreach($data as $division=>$city)
								<option value="{{$division}}" @if ($destination->division == $division) selected @endif>{{$division}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Image</strong><br>
							<input type="file"  name="images[]" id="files" multiple>
							<input type="hidden" name="oldimg[]" id="oldimg" multiple>
							<?php $some = json_decode($destination->image);
							for ($i=0; $i<count($some); $i++) {
								?>
								<img src='{{ asset("/storage/images/destination/".$destination->id."/$some[$i]")}}' width="100" height="70" class="photo" id="{{ strtok($some[$i],'.') }}" value="{{$some[$i]}}">
								<img src="{{ asset ('goldenland/images/cross icon.png') }}" data-id="{{$some[$i]}}"  style="width: 12px;
								height: 12px; margin: -58px 0 0 -15px" id="{{ strtok($some[$i],'.') }}" class="cross">
							<?php } ?>
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12 text-center">
						<center>
							<button type="submit" class="btn btn-primary">Update</button>
							<button type="reset" class="btn btn-primary">Clear</button>
						</center>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


<script type="text/javascript">

$(document).ready(function(){
	var old_array = [];
	old_array = <?php echo json_encode($destination->image);?>;
	old_array = JSON.parse(old_array);

	console.log(old_array)
	$('#oldimg').val(old_array);
/**
 * If cross img click, Destination`s image auto hide.
 * @var [array]
 */
	$(".cross").click(function(){

		var id = $(this).attr('id');
		var searchValue = $(this).attr('data-id');

		var i = $.inArray(searchValue,old_array)

		alert("Are you sure want to delete ?")
		console.log(i);

		if (i >= 0){
			old_array.splice(i,1);
		}

		console.log(old_array,id)

		$('#oldimg').val(old_array);

		$("img.photo#" + id).hide( 500 ).delay( 1000 );
		$("img#" + id + ".cross").hide();
	});
});
</script>

@endsection
