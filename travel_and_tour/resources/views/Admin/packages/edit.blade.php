@extends('layouts.admin')
@section('content')
<a class="btn btn-primary tea" href="{{ route('packages.index') }}"> Back</a>
<div class="row">
	<div class="col-lg-12 margin-tb">
		<center><h2>Edit Package</h2></center>
	</div>
</div><br><br>

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
			<form action="{{route ('packages.update',$package->id)}}" method="POST">
				@csrf
				@method('PUT')

				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Name</strong><span class="text-danger">*</span>
							<input type="text" name="name" class="form-control" value="{{ $package->name}}">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Destination</strong><span class="text-danger">*</span>
							<select class="form-control" name="destination" id="sel">
								@foreach ($destinations as $destination)
								<option value="{{$destination->id}}" @if ($package->destination_id == $destination->id) selected @endif>{{$destination->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Price</strong><span class="text-danger">*</span>
							<input type="text" name="price" class="form-control" value="{{ $package->price}}">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Description</strong><span class="text-danger">*</span>
							<textarea name="description" class="form-control">{{ $package->description}}</textarea>
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
@endsection
