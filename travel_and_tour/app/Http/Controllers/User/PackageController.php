<?php
namespace App\Http\Controllers\User;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use App\Destination;
use App\Package;
use App\Services\Packages\PackageService;
use App\Services\Destinations\DestinationService;
use Illuminate\Http\Request;

/**
 * PackageController of User
 */
class PackageController extends Controller {
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
	 * Constructor of PackageController
	 */
	public function __construct() {
		$this->packageService = new PackageService();
		$this->destinationService = new DestinationService();
	}

	/**
	 * Show all Package Information to User
	 * @return view
	 */
	 public function package() {
	 		$destinations = $this->destinationService->getDestinationList();
	 		$packages = $this->packageService->getPackageList();
	 		return view('User.packages',compact('packages','destinations'));
	 	}

	/**
	 * Get all package by Id
	 * @param  $id
	 * @return view
	 */
	 public function packageById($id) {
 			$packages = $this->packageService->getPackageListById($id);
 			$destinations = $this->destinationService->getDestinationList();
 			return view('User.packages',compact('packages','destinations'));
 		}

	/**
	 * show all package list by Id
	 * @param  $id
	 * @return view
	 */
	public function showPackage($id)
	{
		$package = $this->packageService->showPackage($id);
		$destination = $this->destinationService->showDestination($package->destination_id);
		 return view('User.package_detail',compact('package','destination','id'));
	}
}
