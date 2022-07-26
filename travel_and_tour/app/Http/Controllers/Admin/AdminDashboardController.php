<?php

namespace App\Http\Controllers\Admin;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use App\Services\BookingRequests\BookingRequestService;
use App\Services\UserRequests\UserRequestService;
use Illuminate\Http\Request;

/**
 * Dashboard Controller of Admin
 */
class AdminDashboardController extends Controller {
		/**
		 * Service of UserRequest
		 * @var $UserRequestService
		 */
		private $UserRequestService;

		/**
		 * Service of BookingRequest
		 * @var $BookingRequestService
		 */
		private $BookingRequestService;

		 /**
			* Constructor of AdminDashboardController
			*/
		public function __construct() {
			 $this->UserRequestService = new UserRequestService();
			 $this->BookingRequestService=new BookingRequestService();
		}

		/**
		 * Show total User Request and Booking Request in Admin Dashboard
		 * @return view
		 */
		public function index() {
			$users_request=$this->UserRequestService->getUserRequestList();
			$bookings_request=$this->BookingRequestService->getBookingRequestList();
			$total_user = count($users_request);
			$total_booking = count($bookings_request);
			return view('Admin.dashboard',compact('total_user','total_booking'));
		}
}
