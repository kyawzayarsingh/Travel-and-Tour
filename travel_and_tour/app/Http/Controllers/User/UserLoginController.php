<?php

namespace App\Http\Controllers\User;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Users\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use App\User;
use App\Package;

/**
 * UserLoginController of User
 */
class UserLoginController extends Controller {
	/**
	 * Service of User
	 * @var $userService
	 */
		private $userService;

		/**
		 * Constructor of UserLoginController
		 */
		public function __construct() {
				$this->userService = new UserService();
		}

		/**
		 * For User Login Validated by Email and Password
		 * @param  Request
		 * @return view
		 */
		public function login(Request $request) {
				$package_id =  $request->get('package_id');
				$request->validate([
					'email' => ['required','email'],
					'password' => ['required','min:6']
				]);
				$credentials = $request->only('email', 'password');
				$credentials['status'] = 1;
				if(Auth::attempt($credentials)) {
					if($package_id) {
						return redirect()->route('show.detail',['id'=>$package_id]);
					}
					else {
						return redirect()->route('userHome.index');
					}
				}
				else {
					return redirect()->route('signIn.index')->withInput($request->all())->with('success','Email or password is not correct.');
				}
		}

		/**
		 * For User Logout
		 * @return view
		 */
		public function logout() {
				Session::flush();
				Auth::logout();
				return redirect()->route('signIn.index');
		}
}
