<?php
namespace App\Http\Controllers\User;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use App\Package;
use App\Booking;
use App\Services\Bookings\BookingService;
use App\Services\Packages\PackageService;
use App\Services\Destinations\DestinationService;
use Auth;
use App\Services\BookingRequests\BookingRequestService;
use Illuminate\Http\Request;

/**
* BookingController of User
*/
class BookingController extends Controller {
	/**
	* Service of Booking
	* @var $bookingService
	*/
	private $bookingService;

	/**
	* Service of Package
	* @var $packageService
	*/
	private $packageService;

	/**
	* Constructor of User BookingController
	*/
	public function __construct() {
		$this->packageService = new PackageService();
		$this->bookingService = new BookingService();
		$this->destinationService = new DestinationService();
	}

	/**
	* Show all User Booking
	* @return view
	*/
	public function booking() {
		$packages = $this->packageService->getPackageList();
		$bookings = $this->bookingService->getBookingListById();
		$destinations = $this->destinationService->getDestinationList();
		return view('User.booking', compact('packages', 'bookings', 'destinations'))
		->with('i', 0);
	}

	/**
	* Store User Booking Details to Database
	* @param Request
	* @param view
	*/
	public function toStoreBooking(Request $request, $id) {
		$request->validate([
			'package_id' => 'required',
			'guest_no' => ['required','integer','min:0','max:100'],
			'booking_date' => ['required', 'after:today'],
			'booking_remark' => ['required'],
		]);
		$bookings = $this->bookingService->ToStoreBooking($request);
		$packages = $this->packageService->getshowpackage($id);
		$destinations = $this->packageService->getshowdestination($id);
		return redirect()->route('booking.index', compact('bookings', 'packages', 'destinations', 'id'))->with('i', 0)->with('info', 'booking success');
	}

	/**
	* For User Booking Cancel
	* @param  Request
	* @return view
	*/
	public function bookingDelete(Request $request) {
		$bookings = $this->bookingService->bookingDelete($request->id);
		return redirect()->route('booking.index', compact('bookings'))
		->with('success', 'Booking canceled successfully.');
	}
	/**
	 * For User Booking Edit
	 * @param  Request
	 * @return view
	 */
	public function bookingEdit(Request $request,$id) {
		$booking = $this->bookingService->bookingEditUser($id);
		$package = $this->bookingService->showPackage($booking->package_id);
		$destination = $this->destinationService->showDestination($package->destination_id);
		return view('User.booking_edit', compact( 'booking','package','destination'));
	}
	/**
	 * For User Booking Update
	 * @param  Request
	 * @param    $id
	 * @return view
	 */
	public function bookingUpdate(Request $request,$id) {
		$request->validate([
			'guest_no' => ['required','integer','min:0','max:100'],
			'booking_date' => ['required','date', 'after:today'],
			'booking_remark' => 'required',
		]);
		$booking=$this->bookingService->updateBookingUser($request,$id);
		return redirect()->route('booking.index')
		->with('success','Booking updated successfully');
	}
}
