<?php

namespace App\Http\Controllers\Admin;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use App\Destination;
use App\Package;
use App\Services\Packages\PackageService;
use Illuminate\Http\Request;
use App\Services\Destinations\DestinationService;

/**
 * Package Controller of Admin
 */
class AdminPackageController extends Controller {
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
	 * Constructor of AdminPackageController
	 */
	public function __construct() {
		$this->packageService = new PackageService();
		$this->destinationService = new DestinationService();
	}

	/**
	 * Show Package List
	 * @return view
	 */
	public function index() {
		$packages = $this->packageService->getPackageList();
		$destinations = $this->destinationService->getDestinationList();
		return view('Admin.packages.index',compact('packages'),compact('destinations'));
	}

	/**
	 * Create a Destination by Admin
	 * @return view
	 */
	public function create() {
		$destinations = $this->destinationService->getAllDestinationList();
		return view('Admin.packages.create',compact('destinations'));
	}

	/**
	 * Store Destination Information to Database
	 * @param  Request
	 * @return view
	 */
	public function store(Request $request) {
		$request->validate([
			'name'=>['required','not_regex:/<script\\b[^>]*>(.*?)<\\/script>/i'],
			'destination'=>['required'],
			'price'=>['required','integer','min:10000','max:999999'],
			'description'=>['required','not_regex:/<script\\b[^>]*>(.*?)<\\/script>/i']
		]);
		$packages = $this->packageService->storePackage($request);
		return redirect()->route('packages.index')
		->with ('success','Package created successful');
	}

	/**
	 * Show Destination Information
	 * @param  Package
	 * @return view
	 */
	public function show(Package $package) {
		$package = $this->packageService->showPackage($package->id);
		$destinations = $this->destinationService->showDestination($package->destination_id);
		return view('Admin.packages.show',compact('package','destinations'));
	}

	/**
	 * Edit Destination Details by Admin
	 * @param  Package
	 * @return view
	 */
	public function edit(Package $package) {
		$destinations = $this->destinationService->getDestinationList();
		return view('Admin.packages.edit',compact('package','destinations'));
	}

	/**
	 * Update Destination Information by Admin
	 * @param  Request
	 * @param  $id
	 * @return view
	 */
	public function update(Request $request,$id) {
		$request->validate([
			'name' => ['required','not_regex:/<script\\b[^>]*>(.*?)<\\/script>/i'],
			'destination'=>['required'],
			'price'=>['required','integer','min:10000','max:999999'],
			'description'=>['required','not_regex:/<script\\b[^>]*>(.*?)<\\/script>/i']
		]);
		$packages = $this->packageService->updatePackage($request,$id);
		return redirect()->route('packages.index')
		->with('success','Package updated successful');
	}

	/**
	 * Delete Destination Information by Admin
	 * @param  Package
	 * @return view
	 */
	public function delete(Package $package) {
		$package = $this->packageService->deletePackage($package->id);
		return redirect()->route('packages.index')
		->with('success','Package deleted successful');
	}

	/**
	 * Search Package List by Package Name and Destination Name
	 * @param  Request
	 * @return [type]
	 */
	public function search(Request $request){
		$packages = $this->packageService->searchPackage($request);
		$destinations = $this->destinationService->getDestinationList();
		return view('Admin.packages.index',compact('packages','destinations'));
	}
}
