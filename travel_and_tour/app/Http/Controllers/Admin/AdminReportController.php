<?php

namespace App\Http\Controllers\Admin;

use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use App\Exports\TourMonthExport;
use App\Services\Users\UserService;
use App\Services\Bookings\BookingService;
use App\Services\Packages\PackageService;
use App\Services\Destinations\DestinationService;
use App\Services\Reports\ReportService;
use Illuminate\Http\Request;
use App\Exports\DestinationExport;
use App\Exports\PackageExport;
use App\Exports\BookingExport;
use Excel;
use App\User;
use App\Booking;
use App\Package;
use App\Destination;
use App\Exports\TourYearExport;

/**
 * Report Controller of Admin
 */
class AdminReportController extends Controller {
	/**
	 * Service of Booking
	 * @var $bookingService
	 */
	private $bookingService;

	/**
	 * Service of User
	 * @var $userService
	 */
	private $userService;

	/**
	 * Service of Package
	 * @var $packageService
	 */
	private $packageService;

	/**
	 * Service of Destination
	 * @var $destinationService
	 */
	private $destinationService;

	/**
	 * Service of Report
	 * @var $reportService
	 */
	private $reportService;

	/**
	 * Constructor of AdminReportController
	 */
	public function __construct() {
		$this->bookingService = new BookingService();
		$this->packageService = new PackageService();
		$this->destinationService = new DestinationService();
		$this->reportService = new ReportService();
	}

	/**
	 * Show Admin Destination Report By Year
	 * @param  Request
	 * @return view
	 */
	public function destination(Request $request) {
		$destinations = $this->reportService->getDestinationData($request->get('year'));
		$year =  $request->get('year');
		return view ('Admin.reports.ReportDestination',compact('destinations'),compact('year'))->with('i',0);
	}

	/**
	 * Search Admin Destination Report By Year
	 * @param  Request
	 * @return view
	 */
	public function reportSearch(Request $request) {
		$destinations = $this->reportService->searchDestinationData($request->get('year'));
		$year =  $request->get('year');
		return view ('Admin.reports.ReportDestination',compact('destinations'),compact('year'))->with('i',0);
	}

	/**
	 * Export Destination Report Data in excel file by year
	 * @param  Request
	 * @return Excel
	 */
	public function reportExport(Request $request) {
		$destinations = $this->reportService->searchDestinationData($request->get('year'));
		$year =  $request->get('year');
		return Excel::download(new DestinationExport($year,$destinations), $year.'_Poupular_Destination_Report.xlsx');
	}

	/**
	 * Show Month of Booking List month, Number of Guest and Number of Booking
	 * @param Request
	 * @return view
	 */
	public function tourMonth(Request $request) {
		$tourmonths = $this->reportService->getMonthTourData($request->get('year'));
		$year =  $request->get('year');
		return view ('Admin.reports.month',compact('tourmonths'),compact('year'))->with('i',1);
	}

	/**
	 * Search Month of Booking list by year
	 * @param  Request
	 * @return view
	 */
	public function reportMonthSearch(Request $request) {
		$tourmonths = $this->reportService->searchMonthTourData($request->get('year'));
		$year =  $request->get('year');
		return view ('Admin.reports.month',compact('tourmonths'),compact('year'))->with('i',1);
	}

	/**
	 * Export month of Booking List in Excel file
	 * @param  Request
	 * @return Excel
	 */
	public function reportMonthExport(Request $request) {
		$tourmonths = $this->reportService->searchMonthTourData($request->get('year'));
		$year =  $request->get('year');
		return Excel::download(new TourMonthExport($year,$tourmonths), $year.'_MostTourMonth.xlsx');
	}

	/**
	 * Show Most Booked Customer Details
	 * @param  Request
	 * @return view
	 */
	public function mostBookedCustomer(Request $request) {
		$year = $request['year'];
		$bookingCustomers = $this->reportService->getBookingCustomerList($request->get('year'));
		return view('Admin.reports.mostBookedCustomer',compact('bookingCustomers','year','request'))->with('i',1);
	}

	/**
	 * Search Most Booked Customer Details by year
	 * @param  Request
	 * @return view
	 */
	public function bookingSearch(Request $request) {
		$year = $request['year'];
		$bookingCustomers = $this->reportService->bookingSearch($request->get('year'));
		return view('Admin.reports.mostBookedCustomer',compact('bookingCustomers','year','request'))->with('i',1);
	}

	/**
	 * Export most Booked customer information with excel
	 * @param  Request
	 * @return Excel
	 */
	public function bookingExport(Request $request) {
		$year = $request['year'];
		$bookingCustomers = $this->reportService->bookingSearch($request->get('year'));
		return Excel::download(new BookingExport($year,$bookingCustomers), $year.'_Poupular_Booking_Report.xlsx');
	}

	/**
	 * Show most demanded Package List by PackageName, DestinationName, Number of Booking
	 * @param  Request
	 * @return view
	 */
	public function package(Request $request)  {
		$year = $request['year'];
		$packages = $this->reportService->reportPackageList($request->get('year'));
		return view('Admin.reports.package',compact('packages','request','year'))->with('no',0);
	}

	/**
	 * Search most demanded package list by year
	 * @param  Request
	 * @return view
	 */
	public function searchReportPackage(Request $request)  {
		$year = $request['year'];
		$packages = $this->reportService->searchReportPackage($request->get('year'));
		return view('Admin.reports.package',compact('packages','request','year'))->with('no',0);
	}

	/**
	 * Export Most Demanded Package List with excel
	 * @param  Request
	 * @return Excel
	 */
	public function packageExport(Request $request)  {
		$packages = $this->reportService->searchReportPackage($request->get('year'));
		$year =  $request->get('year');
		return Excel::download(new PackageExport($year,$packages), $year.'_Most_Demanded_Package_Report.xlsx');
	}

	/**
	 * Show yearly finance with month, totalprofit per month , totalbooking per month
	 * @param Request
	 * @return view
	 */
	public function tourYear(Request $request) {
		$month_arr = (config('constant.months'));
		$touryears = $this->reportService->getYearTourData($request->get('year'),$month_arr);
		$year =  $request->get('year');
		return view('Admin.reports.yearlyfinance',compact('touryears'),compact('year'),compact('month_arr'));
	}

	/**
	 * Show Yearly Finance Report search by Year
	 * @param  Request
	 * @return view
	 */
	public function reportYearSearch(Request $request) {
		$month_arr = (config('constant.months'));
		$touryears = $this->reportService->searchYearTourData($request->get('year'),$month_arr);
		$year =  $request->get('year');
		return view ('Admin.reports.yearlyfinance',compact('touryears'),compact('year'),compact('month_arr'));
	}

	/**
	 * Export Yearly Finance Report search by year
	 * @param Request
	 * @return Excel
	 */
	public function tourYearExport(Request $request) {
		$month_arr = (config('constant.months'));
		$touryears = $this->reportService->searchYearTourData($request->get('year'),$month_arr);
		$year =  $request->get('year');
		return Excel::download(new TourYearExport($year,$touryears), $year.'_MostTourYear.xlsx');
	}

}
