<?php

namespace App\Http\Controllers\Admin;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use App\Services\Users\UserService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Storage;
use App\User;

/**
 * User Controller of Admin
 */
class AdminUserController extends Controller {
	/**
	 * Service of User
	 * @var $userService
	 */
	private $userService;

	/**
	 * Constructor of AdminUserController
	 */
	public function __construct() {
		$this->userService = new UserService();
	}

	/**
	 * Show all User List
	 * @return view
	 */
	public function index() {
		$users = $this->userService->getUserList();
		return view('Admin.users.index',compact('users'));
	}

	/**
	 * Create User by Admin
	 * @return view
	 */
	public function create() {
		return view('Admin.users.create');
	}

	/**
	 * Store User Information to Database
	 * @param  Request
	 * @return view
	 */
	public function store(Request $request) {
		$request->validate([
			'name' => ['required','not_regex:/<script\\b[^>]*>(.*?)<\\/script>/i'],
		  'email' => ['required','email','unique:users'],
		  'phone' => ['required','min:8','max:11','regex:/(0)[0-9]{6,9}/'],
		  'dob' => ['required','date','before:-16 years'],
		  'address'=>['required','not_regex:/<script\\b[^>]*>(.*?)<\\/script>/i'],
		  'type' => ['boolean'],
		  'status' => ['boolean'],
		],
		[
			'dob.before' => 'Age should be greater than 16 years old.',
		]
	);

		$user = $this->userService->storeUser($request);
		if($request->hasfile('profile')) {
			$file = $request->file('profile');
			$originalname = $file->getClientOriginalName();
			$path = $file->storeAs('/images/user/'. $user->id, $originalname);
		}
		return redirect()->route('users.index')->with('success','User created successfully.');
	}

	/**
	 * Show User Information by Id
	 * @param  User
	 * @return view
	 */
	public function show(User $user) {
		$users = $this->userService->showUser($user->id);
		return view('Admin.users.show',compact('user'));
	}

	/**
	 * Edit User Detail By Admin
	 * @param  User
	 * @return view
	 */
	public function edit(User $user) {
		return view('Admin.users.edit',compact('user'));
	}

	/**
	 * Update User Information by Id by Admin
	 * @param  Request
	 * @param  $id
	 * @return view
	 */
	public function update(Request $request,$id) {
		$request->validate([
			'name' => ['required','not_regex:/<script\\b[^>]*>(.*?)<\\/script>/i'],
		  'email' => ['required','email',Rule::unique('users')->ignore($id)],
		  'phone' => ['required','min:8','max:11','regex:/(0)[0-9]{6,9}/'],
		  'dob' => ['required','date','before:-16 years'],
		  'address'=>['required','not_regex:/<script\\b[^>]*>(.*?)<\\/script>/i'],
		  'type' => ['boolean'],
		  'status' => ['boolean'],
		],
		[
			'dob.before' => 'Age should be greater than 16 years old.'
		]
	);
		$user = $this->userService->updateUser($request,$id);
		if($request->hasFile('profile')) {
		  $file = $request->file('profile');
		  $originalname = $file->getClientOriginalName();
		  $path = $file->storeAs('/images/user/'. $user->id, $originalname);
		}
		return redirect()->route('users.index')->with('success','User updated successfully.');
	}

	/**
	 * Delete User Information by Id by Admin
	 * @param  User
	 * @return view
	 */
	public function delete(User $user) {
		$users = $this->userService->deleteUser($user->id);
		return redirect()->route('users.index')->with('success','User deleted successfully');
	}

	/**
	 * show all User List search by Name and E-mail
	 * @param  Request
	 * @return view
	 */
	public function search(Request $request) {
		$users = $this->userService->searchUser($request);
		return view('Admin.users.index',compact('users'));
	}
}
