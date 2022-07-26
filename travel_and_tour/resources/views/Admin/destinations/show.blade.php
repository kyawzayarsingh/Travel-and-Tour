@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb">
		<center><h2> Show destination</h2></center>
	</div>
</div><br><br>
<div class="container">
	<div class="col-lg-10 container">
		<div class="comment-form-wrap">
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Name</strong>
						<input type="text" name="name" class="form-control" value="{{ $destination->name}}" disabled>
					</div>
				</div>

				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Description</strong>
						<textarea name="description" class="form-control" disabled>{{ $destination->description}}</textarea>
					</div>
				</div>

				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Division</strong>
						<input type="text" class="form-control" name="division"
						value="{{ $destination->division }}" disabled>
					</div>
				</div>

				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>City</strong>
						<input type="text" class="form-control" name="city" value="{{ $destination->city}}" disabled>
					</div>
				</div>


				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Image</strong><br>
						<?php $some = json_decode($destination->image);
						for ($i=0; $i<count($some); $i++) {
							?>
							<img src='{{ asset("/storage/images/destination/".$destination->id."/$some[$i]")}}'
							width="100px;" height="70px;" alt="image">
							<?php
							if($i == 3) {
								break;
							}
						} ?>
					</div>
				</div>
			
				<div class="col-xs-12 col-sm-12 col-md-12">
					<center><a class="btn btn-primary" href="{{ route('destinations.index') }}"> Back</a></center>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
