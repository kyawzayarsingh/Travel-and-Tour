<?php

namespace App\Services\Users;
use App\Dao\Users\UserDao;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserService {
  /**
  * @var $userDao
  */
  private $userDao;
  /**
   *  Create a user constructor.
   */
  public function __construct() {
    $this->userDao = new UserDao();
  }
  /**
  * Display a listing of the resource.
  * @return \App\Http\Controllers\Admin\AdminUserController
  */

  public function getUserList() {
    return $this->userDao->getUserList();
  }
  /**
  * Register a new user to login.
  * @param $request
  * @return \App\Http\Controllers\Admin\AdminUserController
  */

  public function registerUser($request) {
    $user = new User;
    $user->name = request()->name;
    $user->email = request()->email;
    if(request()->profile != null) {
      $user->profile = request()->profile->getClientOriginalName();
    }
    $user->address = request()->address;
    $user->phone = request()->phone;
    $user->dob = request()->dob;
    $user->type = 1;
    $user->status = 0;
    $user->password = Hash::make(request()->password);
    return $this->userDao->registerUser($user);
  }
  /**
  * Store a newly created user information.
  * @param $request
  * @return \App\Http\Controllers\Admin\AdminUserController
  */

  public function storeUser($request) {
    $user = new User;
    $user->name = request()->name;
    $user->email = request()->email;
    if(request()->profile != null) {
      $user->profile = request()->profile->getClientOriginalName();
    }
    $user->address = request()->address;
    $user->phone = request()->phone;
    $user->dob = request()->dob;
    $user->type = request()->type;
    $user->status = 1;
    $user->password = bcrypt('11111111');
    return $this->userDao->storeUser($user);
  }
  /**
  * Display the specified users.
  * @param $id
  * @return \App\Http\Controllers\Admin\AdminUserController
  */
  public function showUser($id) {
    return $this->userDao->showUser($id);
  }
  /**
  * Update the specified user in storage.
  * @param $request
  * @param $id
  * @return \App\Http\Controllers\Admin\AdminUserController
  */
  public function updateUser($request, $id) {
    $user = User::find($id);
    $user->name = request()->name;
    $user->email = request()->email;
    if(request()->profile != null) {
      $user->profile = request()->profile->getClientOriginalName();
    }
    $user->address = request()->address;
    $user->phone = request()->phone;
    $user->dob = request()->dob;
    $user->type = request()->type;
    return $this->userDao->updateUser($user);
  }
  /**
  * Remove the specified resource from storage.
  * @param $id
  * @return \App\Http\Controllers\Admin\AdminUserController
  */
  public function deleteUser($id) {
    return $this->userDao->deleteUser($id);
  }
  /**
  * Display for searching user's information.
  * @param $request
  * @return \App\Http\Controllers\Admin\AdminUserController
  */
  public function searchUser($request) {
    return $this->userDao->searchUser($request);
  }
  // front
  /**
  * View profile.
  * @return \App\Http\Controllers\User\UserController
  */
  public function getProfile() {
    return $this->userDao->getProfile();
  }
  /**
  * Update specified profile
  * @param $request
  * @return \App\Http\Controllers\User\UserController
  */
  public function profileUpdate($request) {
    //var_dump( User::find(Auth::user()->id));die;
    $user = User::find(Auth::user()->id);
    $user->address = request()->address;
    $user->phone = request()->phone;
    $user->password = Hash::make(request()->new_password);
    if(request()->profile != null) {
      $user->profile = request()->profile->getClientOriginalName();
    }
    return $this->userDao->profileUpdate($user);
  }
}
