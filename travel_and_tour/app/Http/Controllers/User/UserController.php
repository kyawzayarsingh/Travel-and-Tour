<?php

namespace App\Http\Controllers\User;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Auth;
use App\Destination;
use App\Services\Destinations\DestinationService;
use App\User;
use App\Services\Users\UserService;
use Illuminate\Http\Request;

/**
 * UserController of User
 */
class UserController extends Controller {
	/**
	 * Service of Destination
	 * @var $destinationService
	 */
	private $destinationService;

	/**
	 * Service of User
	 * @var $userService
	 */
	private $userService;

	/**
	 * Constructor of UserController
	 */
	public function __construct() {
		$this->destinationService = new DestinationService();
		$this->userService = new UserService();
	}

	/**
	 * Show Destination Info to User Home Page
	 * @return view
	 */
	public function index() {
		$destinations = $this->destinationService->getDestinationList();
		return view('User.main',compact('destinations'));
	}

	/**
	 * About our Travel and Tour
	 * @return view
	 */
	public function about() {
		return view('User.about');
	}

	/**
	 * Our Travel and Tour Contact
	 * @return view
	 */
	public function contact() {
		return view('User.contact');
	}

	/**
	 * For User Sign In
	 * @param  Request
	 * @return view
	 */
	public function signIn(Request $request) {   
		$package_id =  $request->get('package_id');
		return view('User.sign_in',compact('package_id'));
	}
}
