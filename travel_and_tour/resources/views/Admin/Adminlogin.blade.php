@include('layouts.admin')
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

 @if ($message = Session::get('success'))
		<div class="alert alert-warning">
				<p>{{ $message }}</p>
		</div>
@endif
 <div class="container login-container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('/favicon/logo.png')}}" alt="images" class="logo">
                    <div>
                        <img src="{{asset('/favicon/admin.png')}}" alt="images" class="map" 
                     >
                     </div>
                </div>
                <div class="col-md-6 login-form-2">
                    <h3>Admin Login Form</h3>
                  	<form action="{{ route('adminlogin') }}" method="get">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Your Email *" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <input type="Password" name="password" class="form-control" placeholder="Your Password *" value="{{ old('password') }}" />
                        </div>
                        <div class="form-group">
                            <center><input type="submit" class="btnSubmit" value="Login" /></center>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
