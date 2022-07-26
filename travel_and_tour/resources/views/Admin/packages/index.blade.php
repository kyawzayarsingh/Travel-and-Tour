@extends('layouts.admin')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2 class="font-weight-bold mar">Package List</h2>
		</div>
	</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif


<form action="{{ route('packages.search') }}" method="get" role="search">
	@csrf
	<div id="dv1">
		<label for="name">Package Name: </label>
		<input type="text" name= "name" id="txt1" value="{{ request()->input('name') }}">
	</div>
	<div id="dv1">
		<label for="destination_id" id="txt-package">Destination :</label>
		<select class="col-md-3 form-control-lg" name="destination_id" id="sel">
			<option value="0">Select Destination</option>
			@foreach($destinations as $destination)
			<option value="{{ $destination->id }}" {{ (request()->input('destination_id') == $destination->id ? "selected":"") }}>{{ $destination->name }}</option>
			@endforeach
		</select>
	</div>
	<div id="dv2">
		<button type="submit" class="btn btn-dark" id="btn-search">Search</button>
	</div>
	<a class="btn btn-success"  href="{{ route('packages.create') }}"> Create New Package</a>
</form>
<br>
<table class="table table-bordered mar" id="tb1">
	<tr>
		<th>No</th>
		<th>Destination</th>
		<th>Package Name</th>
		<th>Description</th>
		<th>Price</th>
		<th width="280px">Action</th>
	</tr>

	@foreach ($packages as  $package)
	<tr>
		<td>{{ $package->id }}</td>
		<td>{{ $package->destination_name }}</td>
		<td id="word">{{ $package->name}}</td>
		<td id="word">{{ $package->description}}</td>
		<td>{{ $package->price}}  Kyats</td>
		<td>
			<a class="btn btn-info" href="{{ route('packages.show',$package->id)}}">Show</a>

			<a class="btn btn-warning" href="{{ route('packages.edit',$package->id) }}" >Edit</a>
			<button type="button" class="btn btn-danger btndelete" data-toggle="modal" data-target="#deleteModal{{$package->id}}" id="{{ $package->id}}" >Delete</button>


		</td>
	</tr>

	<div id="deleteModal{{$package->id}}" class="modal" role="dialog">
		<div class="modal-dialog ">
			<!-- Modal content-->
			<form action="{{ route('packages.delete',$package->id)}}" id="deleteForm{{$package->id}}" method="post">
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
							<button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="deleteData({{$package->id}})">Yes, Delete</button>
						</center>
					</div>
				</div>
			</form>
		</div>
	</div>
	@endforeach
</table>

	{!! $packages->links() !!}

<script type="text/javascript">
/**
 * Delete Package By Id
 * @param   id
 *
 * @return view of Package List
 */
function deleteData(id)
{
	$("#deleteForm"+id).submit();
}
</script>

@endsection
