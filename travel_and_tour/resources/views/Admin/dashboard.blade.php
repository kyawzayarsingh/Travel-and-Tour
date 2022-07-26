@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 ">
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 ">
      <div class="card">
        <div>
          <a href="requests" class="notification">
            <span><img class="card-img-top" src="../goldenland/images/user.png" alt="Card image"></span>
            @if($total_user== 0)
              <span class="notification badgeGray">{{$total_user}}</span>
            @else
              <span class="notification badgeRed">{{$total_user}}</span>
            @endif
          </a>
        </div>
        <div class="card-body">
         <a href="{{ route('requests.index') }}" class="btn btn-primary col-lg-12 col-md-12 col-sm-12" id="back">User requests</a>
    </div>
      </div>

    </div>
    
    <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="card">
            <div>
             <a href="bookingrequests" class="notification">
              <span><img class="card-img-top" src="../goldenland/images/booking.png" alt="Card image"></span>
              @if($total_booking== 0)
                <span class="notification badgeGray">{{$total_booking}}</span>
              @else
                <span class="notification badgeRed">{{$total_booking}}</span>
              @endif
            </a>
            </div>
            <div class="card-body">
                 <a href="{{route('b_requests.index')}}" class="btn btn-primary col-lg-12 col-md-12 col-sm-12" id="back">Booking requests</a>
            </div>
      </div>
    </div>
  </div>
</div>
@endsection