@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb">
		<center><h2> Show Package</h2></center>
	</div>
</div>

<div class="container">
	<div class="col-lg-10 container">
		<div class="comment-form-wrap">
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Name</strong>
						<input type="text" name="name" class="form-control"  value="{{ $package->name}}" disabled>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Destination</strong>
						<input type="text" name="destination" class="form-control"  value="{{ $destinations->name }}" disabled>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Price</strong>
						<input type="text" name="price" class="form-control"  value="{{ $package->price}}  Kyats"disabled>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Description</strong>
						<textarea name="description" class="form-control" disabled>{{ $package->description}}</textarea>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<center><a class="btn btn-primary" href="{{route('packages.index')}}"> Back</a></center>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
