@extends('layouts.admin')
@section('content')

    <a class="btn btn-primary tea" href="{{ route('destinations.index') }}"> Back</a><br>
    <div class="col-lg-12 margin-tb">
        <center><h2>Add New Destination</h2></center>
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
@endif<br><br>
<div class="container">
	<div class="col-lg-10 container">
		<div class="comment-form-wrap">
			<form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }}">
							<strong>Name</strong><span class="text-danger">*</span>
							<input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
						</div>
					</div>

					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group  {{ $errors->has('description') ? 'has-error' : '' }}">
							<strong>Description</strong><span class="text-danger">*</span>
							<textarea name="description" class="form-control" rows="5" placeholder="Description">{{ old('description') }}</textarea>
						</div>
					</div>

					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group  {{ $errors->has('city') ? 'has-error' : '' }}">
							<strong>City</strong><span class="text-danger">*</span>
							<select class="form-control" name="city">
								@foreach($data as $division=>$city)
								<optgroup label ="{{$division}}">
									@if(is_array($city))
									@foreach($city as $cities)
									<option value="{{$cities}}">{{ $cities }}</option>}
									@endforeach
									@else
									<option value="{{$city}}">{{$city}}</option>
									@endif
								</optgroup>
								@endforeach
							</select>
						</div>
					</div>


					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group  {{ $errors->has('division') ? 'has-error' : '' }}">
							<strong>Division</strong><span class="text-danger">*</span>
							<select class="form-control" name="division">
								@foreach($data as $division=>$city)
								<option value="{{$division}}"> {{ $division }}</option>
								@endforeach
							</select>
						</div>
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Image</strong><br>
							<input type="file" multiple="multiple" name="images[]" id="file-input">
							<div id="thumb-output"></div>
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12 text-center">
						<center>
							<button type="submit" class="btn btn-primary">Create</button>
							<button type="reset" class="btn btn-primary">Cancel</button>
						</center>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
    $('#file-input').on('change', function(){ 
        if (window.File && window.FileReader && window.FileList && window.Blob) {
            var data = $(this)[0].files; 
            if(data.length==4){
	            $.each(data, function(index, file){ 
	                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){
	                    var fRead = new FileReader(); 
	                    fRead.onload = (function(file){
	                    return function(e) {
	                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result); 
	                        $('#thumb-output').append(img); 
	                    };
	                    })(file);
	                    fRead.readAsDataURL(file); 
	                }
	            });
	        }else{
	        	alert("Please,Select Four Image !");
	        	 $('#file-input').val('');
	        }
        }else{
            alert("Your browser doesn't support File API!"); 
        }
    });
});
</script>
@endsection
