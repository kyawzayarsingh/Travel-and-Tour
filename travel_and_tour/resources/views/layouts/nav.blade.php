<!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-light topbar mb-4 static-top shadow">
        <h1 class="navbar-brand font-weight-bold">Golden Land Travel & Tour</h1>
      		<ul class="navbar-nav ml-auto">
      			<li class="nav-item dropdown no-arrow">
              		<a class="nav-link" saria-expanded="false">
                	<span class="mr-2 d-none d-lg-inline text-gray-600 medium">{{Auth::user()->name}}</span>
                	<img class="img-profile rounded-circle" src='{{ asset("/storage/images/user/".Auth::user()->id."/".Auth::user()->profile)}}'>
              		</a>
       			</li>
      		</ul>
    </nav>
        <!-- End of Topbar -->
