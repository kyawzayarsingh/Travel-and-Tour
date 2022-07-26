<?php

namespace App\Http\Controllers\Admin;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\MailConf;
use App\Services\BookingRequests\BookingRequestService;
use App\Services\Users\UserService;
use App\Services\Packages\PackageService;
use App\Services\Destinations\DestinationService;
use Mail;
use PDF;
use App\Booking;
use App\Package;
use App\Destination;
use App\User;

/**
* BookingRequest Controller of Admin
*/
class AdminBookingRequestController extends Controller {
	/**
	* Service of BookingRequest
	* @var $BookingRequestService
	*/
	private $BookingRequestService;

	/**
	* Service of User
	* @var $userService
	*/
	private $userService;

	/**
	* Constructor of AdminBookingRequestController
	*/
	public function __construct() {
		$this->BookingRequestService = new BookingRequestService();
		$this->userService = new UserService();
		$this->packageService = new PackageService();
		$this->destinationService = new DestinationService();
	}

	/**
	* Show Booking Request List to Admin
	* @return view
	*/
	public function bookingRequest() {
		$bookingRequest= $this->BookingRequestService->getBookingRequestList();
		return view('Admin.b_requests.index',compact('bookingRequest'));
	}

	/**
	* For Approval when admin approve the user for the booking
	* @param  Request
	* @return view
	*/
	public function bookingApprove(Request $request) {
		$booking = $this->BookingRequestService->bookingApprove($request->id,$request->status);
		$user = $this->userService->showUser($booking->create_user_id);
		$data =$this->BookingRequestService->getBookingData($booking->id);
		if($booking->status == 1 or $booking->status == 2) {
			if($booking->status == 1) {
				Mail::to($user->email)->send(new MailConf($data));
			}
			return redirect()->route('b_requests.index',compact('booking'))
			->with('success','Booking status updated successfully.');
		}
		elseif($booking->status == 3) {
			return redirect()->route('bookings.checkIn',compact('booking'))
			->with('success','User paid successfully.');
		}
	}
}
