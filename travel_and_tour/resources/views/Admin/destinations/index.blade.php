@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2 class="font-weight-bold mar">Destination List</h2>
		</div>
	</div>
</div><br>
@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif
<div class="col-xs-12 col-sm-12 col-md-12">
	<form action="{{ route('destinations.search') }}" method="get" >
		@csrf
		<div id="dv1">
			<label for="name">Name: </label>
			<input type="text" name= "name" id="txt1" value="{{ request()->input('name') }}">
		</div>

		<div id="dv1">
			<label for="city">City: </label>
			<select name="city" id="txt1" class="sel2">
				<option value="">Please Select City</option>
				@foreach($data as $division=>$city)
				<optgroup label ="{{$division}}">
					@if(is_array($city))
					@foreach($city as $cities)
					<option value="{{$cities}}" {{ (request()->input('city') == $cities ? "selected":"") }}>{{ $cities }}</option>}
					@endforeach
					@else
					<option value="{{$city}}"  {{ (request()->input('city') == $city ? "selected":"") }}>{{$city}}</option>
					@endif
				</optgroup>
				@endforeach
			</select>
		</div>
		<div id="dv1">
			<label for="division">Division: </label>
			<select name="division" id="division" class="sel2" >
				<option value="">Please Select Division</option>
				@foreach($data as $division=>$city)
				<option value="{{$division}}"  {{ (request()->input('division') == $division ? "selected":"") }}> {{ $division }}</option>
				@endforeach
			</select>
		</div>

		<div id="dv2">
			<button type="submit" class="btn btn-dark" id="btn-search">Search</button>
		</div>
		<a class="btn btn-success"  href="{{ route('destinations.create') }}"> Create New Destination</a>
	</form>
</div>
<br>

<div class="col-xs-12 col-sm-12 col-md-12">
	<table class="table table-bordered mar">
	<tr>
		<th>No</th>
		<th>Name</th>
		<th width="120px">Image</th>
		<th>City</th>
		<th>Division</th>
		<th>Description</th>
		<th width="200px">Action</th>
	</tr>
	@foreach ($destinations as $destination)
	<tr>
		<td>{{ $destination->id }}</td>
		<td id="word">{{ $destination->name }}</td>
		<td>
			<?php  $some = json_decode($destination->image);
			for ($i=0; $i<count($some); $i++) {
				?>
				<img src='{{ asset("/storage/images/destination/".$destination->id."/$some[$i]")}}'
				width="50px;" height="50px;" alt="image">

				<?php
				if($i == 3){
					break;
				}

			}  ?> </td>
			<td>{{ $destination->city }}</td>
			<td>{{ $destination->division }}</td>
			<td id="word">{{ $destination->description }}</td>
			<td>
				<form action="{{ route('destinations.delete',$destination->id) }}" method="POST"
					enctype="multipart/form-data" >

					<a class="btn btn-info" href="{{ route('destinations.show',$destination->id) }}">Show</a>

					<a class="btn btn-warning" href="{{ route('destinations.edit',$destination->id) }}">Edit</a>

					@csrf
					@method('DELETE')

					<button type="button" class="btn btn-danger btndelete" data-toggle="modal" data-target="#deleteModal{{$destination->id}}" id="{{ $destination->id}}" >Delete</button>
				</form>
			</td>
		</tr>
		<div id="deleteModal{{$destination->id}}" class="modal" role="dialog">
			<div class="modal-dialog ">
				<!-- Modal content-->
				<form action="{{ route('destinations.delete',$destination->id)}}" id="deleteForm{{$destination->id}}" method="post">
					<div class="modal-content">
						<div class="modal-header bg-danger">
							<h4 class="modal-title text-center">Confirm Delete</h4>
						</div>
						<div class="modal-body">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<p class="text-center">Are You Sure Want To Delete ?</p>
						</div>
						<div class="modal-footer">
							<center>
								<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
								<button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="deleteData({{$destination->id}})">Yes, Delete</button>
							</center>
						</div>
					</div>
				</form>
			</div>
		</div>
		@endforeach
	</table>
	
		{!! $destinations->links() !!}
	
	<script type="text/javascript">
	/**
	* Delete Destinations By Id
	* @param  id
	* @return view Destination List
	*/
	function deleteData(id)
	{
		$("#deleteForm"+id).submit();
	}
	</script>
	@endsection
</div>