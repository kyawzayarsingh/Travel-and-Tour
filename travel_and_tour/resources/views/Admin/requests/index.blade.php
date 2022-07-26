@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb">
		<h2  class="font-weight-bold mar">User Requests</h2>
		<center>
			<form action="{{ route('requests.search') }}" method="POST">
				@csrf
				<label for="name" id="lbl-name">Name :</label>
				<input type="text" name="name" id="req-txt">
				<label for="email" id="lbl-email">Email :</label>
				<input type="email" name="email" id="req-txt">
				<button type="submit" class="btn btn-dark" id="btn-search">Search</button>
			</form>
		</center>
	</div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif
<div class="col-xs-12 col-sm-12 col-md-12">
<table class="table table-bordered mar">
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
	@foreach ($userRequest as $user)
	<tr>
		<td>{{ $user->id }}</td>
		<td id="word">{{ $user->name}}</td>
		<td>{{ $user->email}}</td>
		<td><img src="{{ asset('/storage/images/user/'. $user->id .'/'. $user->profile) }}" width=60px height=50px></td>
		<td id="word">{{ $user->address}}</td>
		<td>{{ $user->phone}}</td>
		<td>{{ $user->dob}}</td>
		<td>
			<form action="{{ route('users.approve',['id'=>$user->id,'status'=>1]) }}" method="POST" class="pull-left">
				@csrf
				<button type="submit" class="btn btn-success">Approve</button>
			</form>
			<span class="rej"><button type="button" class="btn btn-danger btndelete" data-toggle="modal" data-target="#rejectModal{{$user->id}}"
				id="{{ $user->id}}" >Reject</button>
			</td></span>
		</tr>
		<div id="rejectModal{{$user->id}}" class="modal" role="dialog">
			<div class="modal-dialog ">
				<!-- Modal content-->
				<form action="{{ route('users.delete',$user->id) }}" id="deleteForm{{$user->id}}" method="post">
					<div class="modal-content">
						<div class="modal-header bg-danger">
							<h4 class="modal-title text-center">Confirm Reject</h4>
						</div>
						<div class="modal-body">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<p class="text-center">Are You Sure Want To Reject ?</p>
						</div>
						<div class="modal-footer">
							<center>
								<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
								<button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="deleteData({{$user->id}})">Yes, Reject</button>
							</center>
						</div>
					</div>
				</form>
			</div>
		</div>
		@endforeach
	</table>
	<script type="text/javascript">
	/**
	* Delete User Request By Id
	* @param  id
	* @return view User Request List
	*/
	function deleteData(id)
	{
		$("#deleteForm"+id).submit();
	}
	</script>
	@endsection
</div>
