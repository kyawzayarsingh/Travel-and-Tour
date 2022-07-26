<?php

namespace App\Http\Controllers\User;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Destinations\DestinationService;
use App\Destination;

/**
 * DestinationController of User
 */
class DestinationController extends Controller {
	/**
	 * Service of Destination
	 * @var $destinationService
	 */
	private $destinationService;

	/**
	 * Constructor of User DestinationController
	 */
	public function __construct() {
		$this->destinationService = new DestinationService();
	}

	/**
	 * Show all Destination Information to User
	 * @return view
	 */
	public function destination() {
		$data=(config('constant.location'));
		$destinations = $this->destinationService->getDestinationList();
		return view('User.destination',compact('destinations'),compact('data'));
	}

	/**
	 * show destination search by name, city, division
	 * @param  Request
	 * @return view
	 */
	public function search(Request $request) {
		$data=(config('constant.location'));
		$destinations = $this->destinationService->searchDestination($request);
		return view('User.destination',compact('destinations'),compact('data'));
	}

	/**
	 * Show Destiantion Details by Id to User
	 * @param  $id
	 * @return view
	 */
	public function show($id) {
		$destination = $this->destinationService->showDestdetail($id);
		return view('User.dest_detail',compact('destination'));
	}
}
