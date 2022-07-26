<?php

namespace App\Http\Controllers\Admin;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Users\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use App\User;

/**
* Login Controller of Admin
*/
class AdminLoginController extends Controller {
	/**
	* Service of User
	* @var $userService
	*/
	private $userService;
	/**
	* Constructor of AdminLoginController
	*/
	public function __construct() {
		$this->userService = new UserService();
	}

	/**
	* Show Admin Login Page
	* @return view
	*/
	public function index() {
		if(Auth::check() && Auth::user()->type == 0){
			return redirect()->route('dashboard');
		}else{
			return view('Admin.Adminlogin');
		}
	}

	/**
	* For Admin Login, Validate Email and Password
	* @param  Request
	* @return view
	*/
	public function adminlogin (Request $request) {
		$request->validate([
			'email' => ['required','email'],
			'password' => ['required','min:6']
		]);
		$credentials = $request->only('email', 'password');
		$credentials['status'] = 1;
		if(Auth::attempt($credentials)) {
			return redirect()->route('dashboard');
		}
		else {
			return redirect()->route('admin')->withInput($request->all())->with('success','Email or password is not correct.');

        }
    }
	/**
	* For Admin Logout
	* @return view
	*/
	public function adminlogout(){
		Session::flush();
		Auth::logout();
		return redirect()->route('admin');
	}
}
