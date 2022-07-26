<?php
namespace App\Dao\Bookings;
use App\User;
use App\Booking;
use App\Package;
use DB;
use Auth;

class BookingDao{
  /**
  * List of booking
  * @return \App\Services\Bookings\BookingService $booking
  */
  public function getBookingList() {
    $booking = Booking::select("bookings.*","packages.id as package_id","packages.name as package_name","users.email as user_email","users.name as user_name","destinations.name as destination_name")
    ->join("packages","packages.id","bookings.package_id")
    ->join("users","users.id","=","bookings.create_user_id")
    ->join("destinations","destinations.id","packages.destination_id")
    ->where('bookings.status',1)
    ->orWhere('bookings.status',3)
    ->paginate(10);
    return $booking;
  }

  /**
  * List of Package
  * @return \App\Services\Bookings\BookingService $package
  */
  public function getPackageList() {
    $package = Package::get();
    return $package;
  }

  /**
  * Create a new booking
  * @param  \Illuminate\Http\Request $request Booking Data
  * @return \App\Services\Bookings\BookingService $booking
  */
  public function storeBooking($request) {
    $booking =new Booking;
    $booking->package_id=request()->package_id;
    $booking->guest_no=request()->guest_no;
    $booking->totalprice=request()->totalprice;
    $booking->status=request()->status;
    $booking->booking_date=request()->booking_date;
    $booking->booking_remark=request()->booking_remark;
    $booking->create_user_id=Auth::id();
    $booking->save();
    return $booking;
  }

  /**
  * Booking List
  * @param  int $id Booking ID
  * @return \App\Services\Bookings\BookingService $booking
  */
  public function showBooking($id) {
    $booking = Booking::find($id);
    return $booking;
  }

  /**
  * Update Booking
  * @param  \Illuminate\Http\Request $request Booking Data
  * @param  int $id   Booking ID
  * @return \App\Services\Bookings\BookingService $booking
  */
  public function updateBooking($request,$id) {
    $booking = Booking::find($id);
    $booking->package_id=request()->package_id;
    $booking->guest_no=request()->guest_no;
    $booking->totalprice=request()->totalprice;
    $booking->status=request()->status;
    $booking->booking_date=request()->booking_date;
    $booking->booking_remark=request()->booking_remark;
    $booking->save();
    return $booking;
  }

  /**
  * Delete a booking
  * @param  int $id Booking ID
  * @return \App\Services\Bookings\BookingService $booking
  */
  public function deleteBooking($id) {
    $booking = Booking::find($id);
    $booking -> delete();
    return $booking;
  }

  /**
  * Show package by ID
  * @param  int $id Package ID
  * @return \App\Services\Bookings\BookingService $package
  */
  public function showPackage($id) {
    $package = Package::find($id);
    return $package;
  }

  /**
  * Package List
  * @return \App\Services\Bookings\BookingService $package
  */
  public function getPackage() {
    $package = Package::get();
    return $package;
  }

  //for User Booking button to store in database
  /**
  * Create a user booking (Frontend)
  * @param \Illuminate\Http\Request $request Booking from User
  */
  public function ToStoreBooking($request) {
    $package= Package::find($request->package_id);
    $calculatedPrice = $request->guest_no * $package->price;
    $booking =new Booking;
    $booking->package_id=$request->package_id;
    $booking->guest_no=$request->guest_no;
    $booking->booking_date=$request->booking_date;
    $booking->totalprice=$calculatedPrice;
    $booking->booking_remark=$request->booking_remark;
    $booking->create_user_id=Auth::user()->id;
    $booking->save();
    return $booking;
  }

  /**
  * Booking table data (Frontend)
  * @return \App\Services\Bookings\BookingService $booking
  */
  public function getBookingListById() {
    $booking_id = Auth::user()->id;
    $booking = Booking::select("bookings.*","packages.id as package_id","packages.name as package_name","packages.description as package_description","packages.price as package_price","destinations.id as destination_id","destinations.name as destination_name","destinations.city as destination_city","destinations.division as destination_division")
    ->join("packages","packages.id","bookings.package_id")
    ->join("destinations","destinations.id","packages.destination_id")
    ->where(function ($status) {
      $status->where('bookings.status', '=', 0)
      ->orWhere('bookings.status', '=', 1)
      ->orWhere('bookings.status','=',3);
    })
    ->where ('bookings.create_user_id',$booking_id)
    ->get();
    return $booking;
  }
  /**
  * Booking Delete button (Frontend)
  * @param  int $id Booking ID
  * @return \App\Services\Bookings\BookingService $booking
  */
  public function bookingDelete($id) {
    $booking = Booking::find($id);
    $booking->status= 2;
    $booking->save();
    return $booking;
  }

  /**
  * Search Booking (Admin)
  * @param  \Illuminate\Http\Request $request Booking Data
  * @return \App\Services\Bookings\BookingService $booking
  */
  public function searchBooking($request) {
    $bookings = Booking::select("bookings.*","packages.id as package_id","packages.name as package_name","users.email as user_email","users.name as user_name")
    ->join("packages","packages.id","bookings.package_id")
    ->join("users","users.id","=","bookings.create_user_id")
    ->where(function ($status) {
      $status->where('bookings.status', '=', 1)
      ->orWhere('bookings.status', '=', 3);
    });

    if($request->package_name != null) {
      $bookings = $bookings->where('packages.name', 'LIKE' , "%$request->package_name%");
    }

    if($request->booking_date != null) {
      $bookings = $bookings->where('bookings.booking_date','LIKE',$request->booking_date);
    }

    if($request->status != null) {
      $bookings = $bookings->where('bookings.status','LIKE',"%$request->status%");
    }

    $bookings = $bookings->paginate(10)->appends ([
      'package_name' => $request->package_name,
      'booking_date' => $request->booking_date,
      'status' => $request->status
    ]);

    return $bookings;
  }

  /**
  * List of customer who booked
  * @param  date $year Year of booking date
  * @return \App\Services\Bookings\BookingService $bookingCustomer
  */
  public function getBookingCustomerList($year) {
    $bookingCustomer = DB::table('users')
    ->select('bookings.id as booking_id','users.name',
    DB::raw('CASE   WHEN users.type = 1 THEN "User"
    WHEN users.type = 0 THEN "Admin"
    END AS type'),
    DB::raw('COUNT(users.id) as bookingNo'),'users.email','users.phone')
    ->where('bookings.status',3)
    ->whereYear('bookings.booking_date',now()->year)
    ->join('bookings','bookings.create_user_id','=','users.id')
    ->groupBy('users.id')
    ->orderByRaw('bookingNo DESC')
    ->get();
    return $bookingCustomer;
  }

  /**
  * Booking Search(Most Demanded Report- Admin)
  * @param  date $year Year of booking date
  * @return \App\Services\Bookings\BookingService $bookingCustomer
  */
  public function bookingSearch($year) {
    $bookingCustomer = DB::table('users')
    ->select('bookings.id as booking_id','users.name',
    DB::raw('CASE   WHEN users.type = 1 THEN "User"
    WHEN users.type = 0 THEN "Admin"
    END AS type'),
    DB::raw('COUNT(users.id) as bookingNo'),'users.email','users.phone');
    if($year != 0)
    {
      $bookingCustomer=$bookingCustomer->whereYear('bookings.booking_date', $year);
    }else{
      $bookingCustomer=$bookingCustomer->whereYear('bookings.booking_date', now()->year);
    }
    $bookingCustomer=$bookingCustomer->where('bookings.status',3)
    ->join('bookings','bookings.create_user_id','=','users.id')
    ->groupBy('users.id')
    ->orderByRaw('bookingNo DESC')
    ->get();
    return $bookingCustomer;
  }

  /**
  * List of Most Toured Month (Report-Admin)
  * @param  date $year Year of booking date
  * @return \App\Services\Bookings\BookingService $tourmonth
  */
  public function getMonthTourData($year) {
    $tourmonth = DB::table('users')
    ->select(DB::raw('COUNT(users.id) as booking_No'),DB::raw('SUM(bookings.guest_no) as no_Guest'),DB::raw("DATE_FORMAT(bookings.booking_date,'%M') as months"))
    ->where('bookings.status',3)
    ->whereYear('bookings.booking_date','=',now())
    ->join('bookings','bookings.create_user_id','=','users.id')
    ->orderBy('no_Guest', 'desc')
    ->groupBy('months')
    ->paginate(10);
    return $tourmonth;
  }

  /**
  * Search of Most Toured Month(Report-Admin)
  * @param  date $year Year of booking date
  * @return \App\Services\Bookings\BookingService $tourmonth
  */
  public function searchMonthTourData($year) {
    $tourmonth = DB::table('users')
    ->select('bookings.id as booking_id',DB::raw("DATE_FORMAT(bookings.booking_date,'%M') as months"),DB::raw('SUM(bookings.guest_no) as no_Guest'),DB::raw('COUNT(users.id) as booking_No'))
    ->where('bookings.status',3)
    ->whereYear('bookings.booking_date','=',$year)
    ->join('bookings','bookings.create_user_id','=','users.id')
    ->orderBy('no_Guest', 'desc')
    ->groupBy('months')
    ->paginate(10);
    return $tourmonth;
  }

  /**
  * List of Yearly Toured Booking data
  * @param  date $year  Year of booking date
  * @param  date $month Month of booking date
  * @return \App\Services\Bookings\BookingService $tourmonth
  */
  public function getYearTourData($year,$month) {
    $touryear = DB::table('users')
    ->select(DB::raw("DATE_FORMAT(bookings.booking_date,'%M') as months"),
    DB::raw('SUM(bookings.totalprice) as totalProfitPerMonth'),
    DB::raw('COUNT(users.id) as totalBookingPerMonth'))
    ->where('bookings.status',3)
    ->whereYear('bookings.booking_date','=',now())
    ->whereMonth('bookings.booking_date',$month)
    ->join('bookings','bookings.create_user_id','users.id')
    ->orderBy('totalProfitPerMonth', 'desc')
    ->groupBy('months')
    ->first();
    return $touryear;
  }
  /**
  * Search for Yearly Toured Month Data
  * @param  date $year  Year of booking date
  * @param  date $month Month of booking date
  * @return \App\Services\Bookings\BookingService $booking
  */
  public function searchYearTourData($year,$month) {
    $touryear = DB::table('users')
    ->select(DB::raw("DATE_FORMAT(bookings.booking_date,'%M') as months"),
    DB::raw('SUM(bookings.totalprice) as totalProfitPerMonth'),
    DB::raw('COUNT(users.id) as totalBookingPerMonth'))
    ->where('bookings.status',3)
    ->whereYear('bookings.booking_date','=',$year)
    ->whereMonth('bookings.booking_date',$month)
    ->join('bookings','bookings.create_user_id','users.id')
    ->orderBy('totalProfitPerMonth', 'desc')
    ->groupBy('months')
    ->first();
    return $touryear;
  }
  /**
  * List of bookings with status 1 only
  * @return \App\Services\Bookings\BookingService $booking
  */
  public function checkInBook() {
    $booking = Booking::select("bookings.*","packages.id as package_id","packages.name as package_name","users.email as user_email","users.name as user_name")
    ->join("packages","packages.id","bookings.package_id")
    ->join("users","users.id","=","bookings.create_user_id")
    ->where('bookings.status',1)
    ->paginate(10);
    return $booking;
  }
  /**
   * CheckIn search
   * @param   $request
   * @return \App\Services\Bookings\BookingService $booking
   */
  public function checkInSearch($request) {
    $bookings = Booking::select("bookings.*","packages.id as package_id","packages.name as package_name","users.email as user_email","users.name as user_name")
    ->join("packages","packages.id","bookings.package_id")
    ->join("users","users.id","=","bookings.create_user_id")
    ->where("bookings.status",1);

    if($request->booking_date != null) {
      $bookings = $bookings->where('bookings.booking_date','LIKE',$request->booking_date);
    }

    if($request->booking_id != null) {
      $bookings = $bookings->where('bookings.id','LIKE',"%$request->booking_id%");
    }

    $bookings = $bookings->paginate(10)->appends ([
      'bookings.id' => $request->booking_id,
      'booking_date' => $request->booking_date
    ]);
    return $bookings;
  }
  /**
   * find booking list
   * @param   $id
   * @return \App\Services\Bookings\BookingService $booking
   */
  public function bookingEditUser($id)  {
    $booking = Booking::find($id);
    return $booking;
  }
  /**
   * updateBooking list by user
   * @param   $request
   * @param   $id
   * @return \App\Services\Bookings\BookingService $booking
   */
  public function updateBookingUser($request,$id) {
    $booking= Booking::find($id);
    $calculatedPrice = $request->guest_no * $request->price;
    $booking->package_id=$request->package_id;
    $booking->guest_no=$request->guest_no;
    $booking->booking_date=$request->booking_date;
    $booking->totalprice=$calculatedPrice;
    $booking->booking_remark=$request->booking_remark;
    $booking->create_user_id=Auth::user()->id;
    $booking->save();
    return $booking;
  }
}
