<?php

namespace App\Http\Controllers\Admin;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use App\Booking;
use App\Services\Bookings\BookingService;
use App\Services\Packages\PackageService;
use App\Services\Destinations\DestinationService;
use Illuminate\Http\Request;

/**
* Booking Controller of Admin
*/
class AdminBookingController extends Controller {
	/**
	* Service of Booking
	* @var $bookingService
	*/
	private $bookingService;
	private $destinationService;

	/**
	* Constructor of AdminBookingController
	*/
	public function __construct() {
		$this->bookingService = new BookingService();
		$this->destinationService= new DestinationService();
	}

	/**
	* Show booking list join with package
	* @return view
	*/
	public function index() {
		$bookings = $this->bookingService->getBookingList();
		$packages = $this->bookingService->getPackage();
		return view('Admin.bookings.index',compact('bookings','packages'));
	}

	/**
	* Create Booking
	* @return view
	*/
	public function create() {
		$packages = $this->bookingService->getPackageList();
		$destinations = $this->destinationService->getDestinationList();
		$pricelist = [];
		foreach($packages as $package) {
			$pricelist[$package->id] = $package->price;
		}
		$pricelist = json_encode($pricelist);
		return view('Admin.bookings.create',compact('packages','destinations','pricelist'));
	}

	/**
	* Store Booking Information into Database
	* @param  Request
	* @return view
	*/
	public function store(Request $request){
		$request->validate([
			'package_id'=>'required',
			'guest_no' => ['required','integer','min:0','max:100'],
			'totalprice' => ['required','integer','min:10000'],
			'booking_date' =>  ['required','date','after:today'],
			'booking_remark' => 'required',
			'status' => ['boolean'],
		]);
		$bookings = $this->bookingService->storeBooking($request);
		return redirect()->route('bookings.index')
		->with('success','Booking created successfully');
	}

	/**
	* Show the booking details by Id
	* @param  $id
	* @return view
	*/
	public function show($id) {
		$booking = $this->bookingService->showBooking($id);
		$package = $this->bookingService->showPackage($booking->package_id);
		return view('Admin.bookings.show',compact('booking'),compact('package'));
	}

	/**
	* Update Booking information by Admin
	* @param  Request
	* @param  $id
	* @return view
	*/
	public function update(Request $request,$id) {
		$request->validate([
			'package_id'=>'required',
			'guest_no' => ['required','integer','min:0','max:100'],
			'totalprice' => ['required','integer','min:10000'],
			'booking_date' => ['required','date', 'after:today'],
			'booking_remark' => 'required',
			'status' => ['boolean'],
		]);
		$bookings=$this->bookingService->updateBooking($request,$id);
		return redirect()->route('bookings.index')
		->with('success','Booking updated successfully');
	}

	/**
	* Edit booking information by Admin
	* @param  Booking
	* @return view
	*/
	public function edit(Booking $booking) {
		$packages = $this->bookingService->getPackageList();
		$destinations = $this->destinationService->getDestinationList();
		$pricelist = [];
		foreach($packages as $package){
			$pricelist[$package->id] = $package->price;
		}
		$pricelist = json_encode($pricelist);
		return view('Admin.bookings.edit',compact('booking','packages','destinations','pricelist'));
	}

	/**
	* Delete booking by Admin
	* @param  Booking
	* @return view
	*/
	public function delete(Booking $booking) {
		$bookings = $this->bookingService->deleteBooking($booking->id);
		return redirect()->route('bookings.index')
		->with('success','Booking deleted successfully');
	}

	/**
	* search booking list by Package Name and Booking Date
	* @param  Request
	* @return view
	*/
	public function search(Request $request) {
		$bookings = $this->bookingService->searchBooking($request);
		return view('Admin.bookings.index',compact('bookings'));
	}
	/**
	* checkIn List after booking approve
	* @param  Request
	* @return view
	*/
	public function bookingCheckIn(Request $request) {
		$bookings = $this->bookingService->checkInBook($request);
		return view('Admin.bookings.checkIn',compact('bookings'));
	}
	/**
	* search checkIn List after booking approve
	* @param  Request
	* @return view
	*/
	public function checkInSearch(Request $request) {
		$bookings = $this->bookingService->checkInSearch($request);
		return view('Admin.bookings.checkIn',compact('bookings'));
	}
}
