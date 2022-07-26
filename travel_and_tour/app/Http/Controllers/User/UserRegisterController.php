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

/**
* UserRegisterController of User
*/
class UserRegisterController extends Controller {
	/**
	* Service of User
	* @var $userService
	*/
	private $userService;

	/**
	* Constructor of UserRegisterController
	*/
	public function __construct() {
		$this->userService = new UserService();
	}

	/**
	* Show User Register Page
	* @param  Request
	* @return view
	*/
	public function index(Request $request) {
		$package_id =  $request->get('package_id');
		return view('User.register',compact('package_id'));
	}

	/**
	* Validate Register information and store in database
	* @param  Request
	* @return view
	*/
	public function register(Request $request) {
		$package_id =  $request->get('package_id');
		$request->validate([
			'name' => ['required','not_regex:/<script\\b[^>]*>(.*?)<\\/script>/i'],
			'email' => ['required','email','unique:users'],
			'phone' => ['required','min:8','max:11','regex:/(0)[0-9]{6,9}/'],
			'dob' => ['required','date','before:-16 years'],
			'address'=>['required','not_regex:/<script\\b[^>]*>(.*?)<\\/script>/i'],
			'type' => ['boolean'],
			'status' => ['boolean'],
			'password' => ['confirmed','min:8']
		],[
			'dob.before' => 'Age should be greater than 16 years old.',
		]
	);
	$users = $this->userService->registerUser($request);
	if($request->hasfile('profile')) {
		$file = $request->file('profile');
		$originalname = $file->getClientOriginalName();
		$path = $file->storeAs('/images/user/'. $users->id, $originalname);
	}
	if($package_id){
		return redirect()->route('signIn.index',['package_id'=>$package_id])->with('info','Register successfully.');
	}else{
		return redirect()->route('signIn.index')->with('info','Register successfully.');
	}

}
}
