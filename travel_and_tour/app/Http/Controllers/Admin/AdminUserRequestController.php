<?php

namespace App\Http\Controllers\Admin;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use App\Mail\UserMail;
use App\Services\Users\UserService;
use App\User;
use App\Services\UserRequests\UserRequestService;
use Storage;
use Mail;
use Illuminate\Http\Request;

/**
 * User Request Controller of Admin
 */
class AdminUserRequestController extends Controller {
	/**
	 * Service of UserRequest
	 * @var $UserRequestService
	 */
	private $UserRequestService;

	/**
	 * Constructor of AdminUserRequestController
	 */
	public function __construct() {
		$this->UserRequestService = new UserRequestService();
		$this->userService = new UserService();
	}

	/**
	 * Show User Request List to Admin
	 * @return view
	 */
	public function userRequest() {
		$userRequest = $this->UserRequestService->getUserRequestList();
		return view('Admin.requests.index',compact('userRequest'));
	}

	/**
	 * For Approval when admin approve the user for the request
	 * @param  Request
	 * @return view
	 */
	public function userApprove(Request $request) {
		$user = $this->UserRequestService->userApprove($request->id,$request->status);
		$Mail = $user->email;
		if($user -> status == 1) {
			Mail::to($Mail)->send(new UserMail($user));
		}
		return redirect()->route('requests.index')->with('success','User status updated successfully.');
	}

	/**
	 * Search all User Request List by name or by email
	 * @param  Request
	 * @return view
	 */
	public function search(Request $request) {
		$userRequest = $this->UserRequestService->searchUser($request);
		return view('Admin.requests.index',compact('userRequest'));
	}
}
