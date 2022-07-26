<?php

namespace App\Http\Controllers\User;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Services\Users\UserService;
use App\User;
use Auth;

/**
 * Profile Controller of User
 */
class ProfileController extends Controller {
	/**
	 * Service of User
	 * @var $userService
	 */
	private $userService;

	/**
	 * Constructor of ProfileController
	 */
	public function __construct() {
		$this->middleware('auth');
		$this->userService = new UserService();
	}

	/**
	 * Show User Profile Information to User
	 * @return view
	 */
	public function index() {
		$user = $this->userService->getProfile();
		return view('User.profile',compact('user'));
	}

	/**
	 * Edit User Profile Information by User
	 * @param  User
	 * @return view
	 */
	public function edit(User $user) {
		return view('User.profileEdit',compact('user'));
	}

	/**
	 * Update User Password by User
	 * @param  Request
	 * @return view
	 */
	public function update(Request $request) {
		$rules = array(
			'phone' => ['required','max:11'],
			'address'=>['required'],
		);

	 $passwordRules = array (
		 'current_password' => ['required',new MatchOldPassword],
		 'new_password' =>['required'],
		 'new_confirm_password' => ['required','same:new_password'],
		);

	 if($request->has('password')) {
		 $rules=array_merge($rules,$passwordRules);
	 }

		$request -> validate($rules);
		$user = $this->userService->profileUpdate($request);
		if($request->hasFile('profile')) {
			$file = $request->file('profile');
			$originalname = $file->getClientOriginalName();
			$path = $file->storeAs('/images/user/'. $user->id, $originalname);
		}
		return redirect()->route('profile.index')
								 ->with('success',"User updated successfully.");
	}
}
