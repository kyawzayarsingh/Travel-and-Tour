@extends('layouts.admin')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

	<div class="col-lg-4 margin-tb">
		<h2 class="font-weight-bold mar">User List</h2>
	</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif
<center>
<form action="{{ route('users.search')}}" method="get" >
	@csrf
	<label for="name" id="lbl-name">Name :</label>
	<input type="text" name="name" id="req-txt" value="{{ request()->input('name') }}">
	<label for="email" id="lbl-email">Email :</label>
	<input type="email" name="email"  id="req-txt" value="{{ request()->input('email') }}">
	<button type="submit" class="btn btn-dark" id="btn-search">Search</button>
	<a class="btn btn-success"  href="{{ route('users.create') }}"> Create New User</a>
</form></center><br>
<div class="col-xs-12 col-sm-12 col-md-12 mar">
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Email</th>
			<th>Photo</th>
			<th>Address</th>
			<th>Phone</th>
			<th>Date Of Birth</th>
			<th width="280px">Action</th>
		</tr>
		@foreach ($users as $user)
		<tr>
			<td>{{ $user->id }}</td>
			<td id="word">{{ $user->name}}</td>
			<td>{{ $user->email}}</td>
			<td>  <img src="{{ asset('/storage/images/user/'. $user->id .'/'. $user->profile) }}" width=60px height=50px></td>
			<td id="word">{{ $user->address}}</td>
			<td>{{ $user->phone}}</td>
			<td>{{ $user->dob}}</td>

			<td>

				<a class="btn btn-info" href="{{ route('users.show',$user->id)}}">Show</a>

				<a class="btn btn-warning" href="{{ route('users.edit',$user->id) }}" >Edit</a>

				@if(Auth::user()->id != $user->id)
				<button type="button" class="btn btn-danger btndelete" data-toggle="modal" data-target="#deleteModal{{$user->id}}" >Delete</button>
				@endif
			</td>
		</tr>

		<div id="deleteModal{{$user->id}}" class="modal" role="dialog">
			<div class="modal-dialog ">
				<!-- Modal content-->
				<form action="{{ route('users.delete',$user->id)}}" id="deleteForm{{$user->id}}" method="post">
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
								<button type="submit" class="btn btn-danger" data-dismiss="modal" onclick="deleteData({{$user->id}})">Yes, Delete</button>
							</center>
						</div>
					</div>
				</form>
			</div>
		</div>
		@endforeach
	</table>
</div>

{!! $users->links() !!}

<script type="text/javascript">
/**
* Delete User By Id
* @param  id
* @return view User List
*/
function deleteData(id)
{
	$("#deleteForm"+id).submit();
}
</script>
@endsection
