<ul class="navbar-nav bg-gradient-light sidebar sidebar-light accordion"
id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('users.show',Auth::user()->id) }}">
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route ('dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Users Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-fw fa-user"></i>
          <span>Users</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('users.create') }}">Add New User</a>
            <a class="collapse-item" href="{{ route('users.index') }}">User List</a>
            <a class="collapse-item" href="{{ route('requests.index') }}">User Requests</a>
          </div>
        </div>
      </li>

       <!-- Nav Item - Destination Collapse Menu -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-map-marker"></i>
          <span>Destinations</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ route('destinations.create') }}">Add New Destination</a>
            <a class="collapse-item" href="{{ route('destinations.index') }}">Destination List</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Packages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-parking"></i>
          <span>Packages</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('packages.create') }}">Add New Package</a>
            <a class="collapse-item" href="{{ route('packages.index') }}">Package List</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Booking -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsebook" aria-expanded="true" aria-controls="collapsebook">
          <i class="fab fa-bootstrap"></i>
          <span>Booking</span>
        </a>
        <div id="collapsebook" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
           <a class="collapse-item" href="{{ route('bookings.create') }}">Add New Booking</a>
           <a class="collapse-item" href="{{ route('bookings.index') }}">Booking List</a>
           <a class="collapse-item" href="{{ route('b_requests.index') }}">Booking Requests</a>
           <a class="collapse-item" href="{{ route('bookings.checkIn') }}">Booking CheckIn</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Booking -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-file-excel"></i>
          <span>Report</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('report.destination') }}">Most Popular Destinations</a>
            <a class="collapse-item" href="{{route('reports.package')}}">Most Demanded Packages</a>
            <a class="collapse-item" href="{{ route('report.mostBookedCustomer') }}">Most Booked Customers</a>
            <a class="collapse-item" href="{{route('report.month')}}">Most Toured Months</a>
            <a class="collapse-item" href="{{route('report.year')}}">Yearly Finance</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Logout -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('adminlogout')}}"
         aria-controls="collapsePages">
          <span>Logout</span>
        </a>
      </li>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
       </ul>
